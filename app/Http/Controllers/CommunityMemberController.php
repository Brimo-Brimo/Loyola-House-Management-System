<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\CommunityMember;
use Illuminate\Http\Request;

class CommunityMemberController extends Controller
{
    public function index()
    {
        $members = CommunityMember::latest()->get();

        return view('community-members.index', compact('members'));
    }

    public function create()
    {
        return view('community-members.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name'     => 'required|max:255',
        'other_names'    => 'nullable|string|max:255',
        'last_name'      => 'required|max:255',
        'religious_name' => 'nullable|max:255',
        'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'email'          => 'required|email|unique:users,email',
        'phone'          => 'nullable|max:30',
        'community'      => 'required',
        'room'           => 'nullable|max:50',
        'status'         => 'required',

        // New field
        'password'       => 'required|min:8|confirmed',
    ]);

    DB::transaction(function () use ($request, $validated) {

        $role = Role::where('name', 'Community Member')->firstOrFail();

        // Create login account
        $user = User::create([
            'role_id'      => $role->id,
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'],
            'password'     => Hash::make($validated['password']),
            'is_active'    => true,
        ]);

        if ($request->hasFile('photo')) {

            $filename = time().'_'.Str::random(8).'.'.$request->photo->extension();

            $request->photo->storeAs(
                'community-members',
                $filename,
                'public'
            );

            $validated['photo'] = $filename;
        }

        $validated['user_id'] = $user->id;

        unset($validated['password']);
        unset($validated['password_confirmation']);

        CommunityMember::create($validated);

    });

    return redirect()
        ->route('community-members.index')
        ->with('success', 'Community member created successfully with a login account.');
}
    public function show(CommunityMember $communityMember)
    {
        return view('community-members.show', [
            'member' => $communityMember
        ]);
    }

    public function edit(CommunityMember $communityMember)
    {
        return view('community-members.edit', [
            'member' => $communityMember
        ]);
    }

    public function update(Request $request, CommunityMember $communityMember)
{
    $validated = $request->validate([
        'first_name'     => 'required|max:255',
        'other_names'    => 'nullable|string|max:255',
        'last_name'      => 'required|max:255',
        'religious_name' => 'nullable|max:255',
        'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'email'          => 'nullable|email',
        'phone'          => 'nullable|max:30',
        'community'      => 'required',
        'room'           => 'nullable|max:50',
        'status'         => 'required',
    ]);

    if ($request->hasFile('photo')) {

        if ($communityMember->photo &&
            Storage::disk('public')->exists('community-members/'.$communityMember->photo)) {

            Storage::disk('public')->delete('community-members/'.$communityMember->photo);
        }

        $filename = time().'_'.Str::random(8).'.'.$request->photo->extension();

        $request->photo->storeAs(
            'community-members',
            $filename,
            'public'
        );

        $validated['photo'] = $filename;
    }

    $communityMember->update($validated);

    return redirect()
        ->route('community-members.index')
        ->with('success', 'Community member updated successfully.');
}
}
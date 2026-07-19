<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('first_name')->get();

        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }
public function store(Request $request)
{
    $validated = $request->validate([

        'staff_number' => 'nullable|unique:staff,staff_number',
        'first_name'   => 'required|string|max:255',
        'other_names'  => 'nullable|string|max:255',
        'last_name'    => 'required|string|max:255',
        'department'   => 'required|string|max:255',
        'position'     => 'required|string|max:255',
        'phone'        => 'nullable|string|max:20',

        'email'        => 'required|email|unique:users,email',
        'password'     => 'required|min:8|confirmed',

    ]);

    DB::transaction(function () use ($request, $validated) {

        $role = Role::where('name', 'Staff')->firstOrFail();

        User::create([

            'role_id'    => $role->id,
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'password'   => Hash::make($validated['password']),
            'is_active'  => true,

        ]);

        Staff::create([

            'staff_number' => $validated['staff_number'],
            'first_name'   => $validated['first_name'],
            'other_names'  => $validated['other_names'],
            'last_name'    => $validated['last_name'],
            'department'   => $validated['department'],
            'position'     => $validated['position'],
            'phone'        => $validated['phone'],
            'takes_lunch'  => $request->has('takes_lunch'),
            'takes_supper' => $request->has('takes_supper'),
            'active'       => $request->has('active'),

        ]);

    });

    return redirect()
        ->route('staff.index')
        ->with('success', 'Staff member registered successfully with a login account.');
}
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'staff_number' => 'nullable|unique:staff,staff_number,' . $staff->id,
            'first_name' => 'required',
            'other_names' => 'nullable',
            'last_name' => 'required',
            'department' => 'required',
            'position' => 'required',
            'phone' => 'nullable',
        ]);

       

        $staff->update($validated);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff updated successfully.');
    }
public function show(Staff $staff)
{
    return redirect()->route('staff.edit', $staff);
}
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff removed successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\RoomAllocation;
use App\Models\CommunityMember;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomAllocationController extends Controller
{
    public function index()
    {
        $allocations = RoomAllocation::with([
            'member',
            'room.floor.wing.building'
        ])
        ->where('active', true)
        ->latest()
        ->get();

        return view('room-allocations.index', compact('allocations'));
    }

    public function create()
    {
        $members = CommunityMember::orderBy('first_name')->get();

        $rooms = Room::with('floor.wing.building')
            ->where('status', 'Available')
            ->orderBy('room_number')
            ->get();

        return view('room-allocations.create', compact('members', 'rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'community_member_id' => 'required|exists:community_members,id',
            'room_id' => 'required|exists:rooms,id',
            'allocated_from' => 'required|date',
        ]);

        // Check whether the selected room already has an active allocation
        $occupied = RoomAllocation::where('room_id', $validated['room_id'])
            ->where('active', true)
            ->exists();

        if ($occupied) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room is already occupied.',
                ]);
        }

        // End any previous active allocation for this member
        RoomAllocation::where('community_member_id', $validated['community_member_id'])
            ->where('active', true)
            ->update([
                'active' => false,
                'allocated_to' => now()->toDateString(),
            ]);

        // Create the new allocation
        RoomAllocation::create([
            'community_member_id' => $validated['community_member_id'],
            'room_id' => $validated['room_id'],
            'allocated_from' => $validated['allocated_from'],
            'active' => true,
        ]);

        return redirect()
            ->route('room-allocations.index')
            ->with('success', 'Room allocated successfully.');
    }

    public function destroy(RoomAllocation $roomAllocation)
    {
        $roomAllocation->update([
            'active' => false,
            'allocated_to' => now()->toDateString(),
        ]);

        return redirect()
            ->route('room-allocations.index')
            ->with('success', 'Room allocation ended successfully.');
    }
}
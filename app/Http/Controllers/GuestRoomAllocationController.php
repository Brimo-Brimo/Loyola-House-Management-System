<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Room;
use App\Models\GuestRoomAllocation;
use Illuminate\Http\Request;

class GuestRoomAllocationController extends Controller
{
    public function index()
    {
        $allocations = GuestRoomAllocation::with([
            'guest',
            'room.floor.wing.building'
        ])
        ->where('active', true)
        ->latest()
        ->get();

        return view('guest-room-allocations.index', compact('allocations'));
    }

    public function create()
    {
        $guests = Guest::where('status', 'Checked In')
            ->orderBy('full_name')
            ->get();

        $rooms = Room::with('floor.wing.building')
            ->whereHas('floor.wing.building', function ($query) {
                $query->where('type', 'Guest House');
            })
            ->whereDoesntHave('guestAllocations', function ($query) {
                $query->where('active', true);
            })
            ->orderBy('room_number')
            ->get();

        return view('guest-room-allocations.create', compact('guests', 'rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'allocated_from' => 'required|date',
        ]);

        GuestRoomAllocation::where('guest_id', $validated['guest_id'])
            ->where('active', true)
            ->update([
                'active' => false,
                'allocated_to' => now()->toDateString(),
            ]);

        GuestRoomAllocation::create([
            'guest_id' => $validated['guest_id'],
            'room_id' => $validated['room_id'],
            'allocated_from' => $validated['allocated_from'],
            'active' => true,
        ]);

        return redirect()
            ->route('guest-room-allocations.index')
            ->with('success', 'Guest room assigned successfully.');
    }

    public function destroy(GuestRoomAllocation $guestRoomAllocation)
    {
        $guestRoomAllocation->update([
            'active' => false,
            'allocated_to' => now()->toDateString(),
        ]);

        return redirect()
            ->route('guest-room-allocations.index')
            ->with('success', 'Guest checked out successfully.');
    }
}
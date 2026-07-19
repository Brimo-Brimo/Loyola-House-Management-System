<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
{
    $rooms = Room::with([
        'floor',
        'floor.wing',
        'floor.wing.building'
    ])
    ->orderBy('room_number')
    ->get();

    return view('rooms.index', compact('rooms'));
}

    public function create()
    {
        $floors = Floor::with('wing.building')->orderBy('name')->get();

        return view('rooms.create', compact('floors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'room_number' => 'required|max:20',
            'room_type' => 'required|max:100',
            'capacity' => 'required|integer|min:1',
            'status' => 'required',
            'description' => 'nullable',
        ]);

        Room::create($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $floors = Floor::with('wing.building')->orderBy('name')->get();

        return view('rooms.edit', compact('room', 'floors'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'room_number' => 'required|max:20',
            'room_type' => 'required|max:100',
            'capacity' => 'required|integer|min:1',
            'status' => 'required',
            'description' => 'nullable',
        ]);

        $room->update($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
    public function show(Room $room)
{
    return view('room-bookings.book',compact('room'));
}
}
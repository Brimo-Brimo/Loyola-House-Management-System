<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Wing;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $floors = Floor::with('wing.building')->latest()->get();

        return view('floors.index', compact('floors'));
    }

    public function create()
    {
        $wings = Wing::orderBy('name')->get();

        return view('floors.create', compact('wings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'wing_id' => 'required|exists:wings,id',
            'name' => 'required|max:255',
            'code' => 'required|max:20|unique:floors',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        Floor::create($validated);

        return redirect()
            ->route('floors.index')
            ->with('success', 'Floor created successfully.');
    }

    public function edit(Floor $floor)
    {
        $wings = Wing::orderBy('name')->get();

        return view('floors.edit', compact('floor', 'wings'));
    }

    public function update(Request $request, Floor $floor)
    {
        $validated = $request->validate([
            'wing_id' => 'required|exists:wings,id',
            'name' => 'required|max:255',
            'code' => 'required|max:20|unique:floors,code,' . $floor->id,
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        $floor->update($validated);

        return redirect()
            ->route('floors.index')
            ->with('success', 'Floor updated successfully.');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect()
            ->route('floors.index')
            ->with('success', 'Floor deleted successfully.');
    }
}
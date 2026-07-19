<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the buildings.
     */
    public function index()
    {
        $buildings = Building::latest()->get();

        return view('buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new building.
     */
    public function create()
    {
        return view('buildings.create');
    }

    /**
     * Store a newly created building.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|max:255',
            'code'        => 'required|max:20|unique:buildings,code',
            'type'        => 'required|max:100',
            'floors'      => 'required|integer|min:1',
            'description' => 'nullable',
            'active'      => 'required|boolean',
        ]);

        Building::create($validated);

        return redirect()
            ->route('buildings.index')
            ->with('success', 'Building created successfully.');
    }

    /**
     * Show the form for editing a building.
     */
    public function edit(Building $building)
    {
        return view('buildings.edit', compact('building'));
    }

    /**
     * Update the specified building.
     */
    public function update(Request $request, Building $building)
    {
        $validated = $request->validate([
            'name'        => 'required|max:255',
            'code'        => 'required|max:20|unique:buildings,code,' . $building->id,
            'type'        => 'required|max:100',
            'floors'      => 'required|integer|min:1',
            'description' => 'nullable',
            'active'      => 'required|boolean',
        ]);

        $building->update($validated);

        return redirect()
            ->route('buildings.index')
            ->with('success', 'Building updated successfully.');
    }

    /**
     * Remove the specified building.
     */
    public function destroy(Building $building)
    {
        $building->delete();

        return redirect()
            ->route('buildings.index')
            ->with('success', 'Building deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Wing;
use App\Models\Building;
use Illuminate\Http\Request;

class WingController extends Controller
{
    public function index()
    {
        $wings = Wing::with('building')->latest()->get();

        return view('wings.index', compact('wings'));
    }

    public function create()
    {
        $buildings = Building::where('active', 1)->get();

        return view('wings.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'name' => 'required|max:255',
            'code' => 'required|max:20|unique:wings,code',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        Wing::create($validated);

        return redirect()
            ->route('wings.index')
            ->with('success', 'Wing created successfully.');
    }

    public function edit(Wing $wing)
    {
        $buildings = Building::where('active', 1)->get();

        return view('wings.edit', compact('wing', 'buildings'));
    }

    public function update(Request $request, Wing $wing)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'name' => 'required|max:255',
            'code' => 'required|max:20|unique:wings,code,' . $wing->id,
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        $wing->update($validated);

        return redirect()
            ->route('wings.index')
            ->with('success', 'Wing updated successfully.');
    }

    public function destroy(Wing $wing)
    {
        $wing->delete();

        return redirect()
            ->route('wings.index')
            ->with('success', 'Wing deleted successfully.');
    }
}
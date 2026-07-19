<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::latest()->get();

        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'gender' => 'required',
            'phone' => 'nullable|max:30',
            'email' => 'nullable|email',
            'institution' => 'nullable|max:255',
            'purpose' => 'required|max:255',
            'check_in' => 'required|date',
            'expected_checkout' => 'required|date|after_or_equal:check_in',
        ]);

        $validated['status'] = 'Checked In';

        Guest::create($validated);

        return redirect()
            ->route('guests.index')
            ->with('success', 'Guest registered successfully.');
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'gender' => 'required',
            'phone' => 'nullable|max:30',
            'email' => 'nullable|email',
            'institution' => 'nullable|max:255',
            'purpose' => 'required|max:255',
            'check_in' => 'required|date',
            'expected_checkout' => 'required|date|after_or_equal:check_in',
            'status' => 'required',
        ]);

        $guest->update($validated);

        return redirect()
            ->route('guests.index')
            ->with('success', 'Guest updated successfully.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()
            ->route('guests.index')
            ->with('success', 'Guest deleted successfully.');
    }
}
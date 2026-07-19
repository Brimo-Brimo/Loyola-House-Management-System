<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\GuestMealAttendance;
use Illuminate\Http\Request;

class GuestMealAttendanceController extends Controller
{
    public function index()
    {
        $attendances = GuestMealAttendance::with('guest')
            ->latest()
            ->get();

        return view('guest-meal-attendances.index', compact('attendances'));
    }

    public function create()
    {
        $guests = Guest::where('status', 'Checked In')
            ->orderBy('full_name')
            ->get();

        return view('guest-meal-attendances.create', compact('guests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'guest_id' => 'required|exists:guests,id',

            'meal_date' => 'required|date',

            'meal' => 'required|in:Lunch,Supper',

            'status' => 'required|in:Present,Absent',

        ]);

        GuestMealAttendance::updateOrCreate(

            [
                'guest_id' => $validated['guest_id'],
                'meal_date' => $validated['meal_date'],
                'meal' => $validated['meal'],
            ],

            [
                'status' => $validated['status'],
            ]

        );

        return redirect()
            ->route('guest-meal-attendances.index')
            ->with('success', 'Meal attendance recorded successfully.');
    }

    public function destroy(GuestMealAttendance $guestMealAttendance)
    {
        $guestMealAttendance->delete();

        return redirect()
            ->route('guest-meal-attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}
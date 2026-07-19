<?php

namespace App\Http\Controllers;

use App\Models\MealAttendance;
use App\Models\CommunityMember;
use Illuminate\Http\Request;

class MealAttendanceController extends Controller
{
    public function index()
    {
        $attendances = MealAttendance::with('communityMember')
            ->latest()
            ->paginate(20);

        return view('meal-attendances.index', compact('attendances'));
    }

    public function create()
    {
        $members = CommunityMember::orderBy('first_name')->get();

        return view('meal-attendances.create', compact('members'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'community_member_id' => 'required|exists:community_members,id',
        'meal_date' => 'required|date',
        'meal' => 'required|in:Breakfast,Lunch,Supper',
        'status' => 'required|in:Present,Absent,Away,Excused',
    ]);

    // Prevent duplicate attendance
    $exists = MealAttendance::where('community_member_id', $validated['community_member_id'])
        ->where('meal_date', $validated['meal_date'])
        ->where('meal', $validated['meal'])
        ->exists();

    if ($exists) {
        return back()
            ->withInput()
            ->withErrors([
                'community_member_id' => 'Attendance for this member has already been recorded for this meal on the selected date.'
            ]);
    }

    MealAttendance::create($validated);

    return redirect()
        ->route('meal-attendances.index')
        ->with('success', 'Meal attendance recorded successfully.');
}

    public function edit(MealAttendance $mealAttendance)
    {
        $members = CommunityMember::orderBy('first_name')->get();

        return view('meal-attendances.edit', compact('mealAttendance', 'members'));
    }

    public function update(Request $request, MealAttendance $mealAttendance)
{
    $validated = $request->validate([
        'community_member_id' => 'required|exists:community_members,id',
        'meal_date' => 'required|date',
        'meal' => 'required|in:Lunch,Supper',
        'status' => 'required|in:Present,Absent,Away,Excused',
    ]);

    // Prevent duplicate attendance except this record
    $exists = MealAttendance::where('community_member_id', $validated['community_member_id'])
        ->where('meal_date', $validated['meal_date'])
        ->where('meal', $validated['meal'])
        ->where('id', '!=', $mealAttendance->id)
        ->exists();

    if ($exists) {
        return back()
            ->withInput()
            ->withErrors([
                'community_member_id' => 'Attendance for this member has already been recorded for this meal on the selected date.'
            ]);
    }

    $mealAttendance->update($validated);

    return redirect()
        ->route('meal-attendances.index')
        ->with('success', 'Meal attendance updated successfully.');
}
    public function destroy(MealAttendance $mealAttendance)
    {
        $mealAttendance->delete();

        return redirect()
            ->route('meal-attendances.index')
            ->with('success', 'Meal attendance deleted successfully.');
    }
}
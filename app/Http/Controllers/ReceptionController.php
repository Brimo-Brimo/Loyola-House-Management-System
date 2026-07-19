<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\RoomBooking;
use App\Models\MealAttendance;
use App\Models\GuestMealAttendance;
use App\Models\StaffMealAttendance;

class ReceptionController extends Controller
{
    public function index()
    {
        $today = today();

        $arrivals = RoomBooking::whereDate('check_in_date', $today)
            ->whereIn('status', ['Approved', 'Checked In'])
            ->orderBy('arrival_time')
            ->get();

        $departures = RoomBooking::whereDate('check_out_date', $today)
            ->where('status', 'Checked In')
            ->orderBy('departure_time')
            ->get();

        $announcements = Announcement::latest()
    ->take(10)
    ->get();

        $lunch =
            MealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Lunch')->count()
            +
            GuestMealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Lunch')->count()
            +
            StaffMealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Lunch')->count();

        $supper =
            MealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Supper')->count()
            +
            GuestMealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Supper')->count()
            +
            StaffMealAttendance::whereDate('meal_date', $today)
                ->where('meal', 'Supper')->count();

        return view(
            'reception.index',
            compact(
                'arrivals',
                'departures',
                'announcements',
                'lunch',
                'supper'
            )
        );
    }
}
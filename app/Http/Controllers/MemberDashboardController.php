<?php

namespace App\Http\Controllers;

use App\Models\MealBooking;
use App\Models\RoomBooking;
use App\Models\AwayNotice;
use App\Models\Announcement;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $today = now()->toDateString();

        $todayMeals = MealBooking::where('user_id',$user->id)

            ->whereDate('meal_date',$today)

            ->get();

        $roomBookings = RoomBooking::where('user_id',$user->id)

            ->latest()

            ->take(5)

            ->get();

        $awayNotices = AwayNotice::where('user_id',$user->id)

            ->latest()

            ->take(5)

            ->get();

        $announcements = Announcement::where('user_id',$user->id)

            ->latest()

            ->take(5)

            ->get();

        return view(

            'member.dashboard',

            compact(

                'todayMeals',

                'roomBookings',

                'awayNotices',

                'announcements'

            )

        );
    }
}
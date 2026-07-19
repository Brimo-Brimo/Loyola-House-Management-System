<?php

namespace App\Http\Controllers;

use App\Models\MealBooking;
use Carbon\Carbon;

class KitchenController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        /*
        |--------------------------------------------------------------------------
        | TODAY COUNTS
        |--------------------------------------------------------------------------
        */

        $membersLunch = MealBooking::whereDate('meal_date', $today)
            ->where('meal', 'Lunch')
            ->count();

        $membersSupper = MealBooking::whereDate('meal_date', $today)
            ->where('meal', 'Supper')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | TOMORROW COUNTS
        |--------------------------------------------------------------------------
        */

        $tomorrowLunch = MealBooking::whereDate('meal_date', $tomorrow)
            ->where('meal', 'Lunch')
            ->count();

        $tomorrowSupper = MealBooking::whereDate('meal_date', $tomorrow)
            ->where('meal', 'Supper')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | LISTS
        |--------------------------------------------------------------------------
        */

        $lunchBookings = MealBooking::with('user.role')
            ->whereDate('meal_date', $today)
            ->where('meal', 'Lunch')
            ->orderBy('created_at')
            ->get();

        $supperBookings = MealBooking::with('user.role')
            ->whereDate('meal_date', $today)
            ->where('meal', 'Supper')
            ->orderBy('created_at')
            ->get();

        return view('kitchen.index', compact(
            'membersLunch',
            'membersSupper',
            'tomorrowLunch',
            'tomorrowSupper',
            'lunchBookings',
            'supperBookings'
        ));
    }
}
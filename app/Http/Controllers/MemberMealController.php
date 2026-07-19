<?php

namespace App\Http\Controllers;

use App\Models\MealBooking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberMealController extends Controller
{
    public function index()
    {
        $dates = [];

        for ($i = 0; $i < 7; $i++) {
            // Store Carbon objects instead of strings
            $dates[] = Carbon::today()->addDays($i);
        }

        $bookings = MealBooking::where('user_id', auth()->id())
            ->get()
            ->keyBy(function ($booking) {
                return Carbon::parse($booking->meal_date)->format('Y-m-d')
                    . '_' . $booking->meal;
            });

        return view('member.meals', compact('dates', 'bookings'));
    }

    public function store(Request $request)
    {
        MealBooking::where('user_id', auth()->id())->delete();

        foreach ($request->meals ?? [] as $date => $meals) {

            foreach ($meals as $meal) {

                MealBooking::create([
                    'user_id'   => auth()->id(),
                    'meal_date' => $date,
                    'meal'      => $meal,
                    'booked'    => true,
                ]);

            }
        }

        return back()->with(
            'success',
            'Meals saved successfully.'
        );
    }
}
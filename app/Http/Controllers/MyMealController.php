<?php

namespace App\Http\Controllers;

use App\Models\MealBooking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MyMealController extends Controller
{
    public function index()
    {
        $dates = [];

        for ($i = 0; $i < 30; $i++) {

    $dates[] = Carbon::today()->addDays($i);

}

        $bookings = MealBooking::where('user_id', auth()->id())
                    ->get()
                    ->keyBy(function ($booking) {
                        return $booking->meal_date . '_' . $booking->meal;
                    });

        return view(
            'member.meals',
            compact('dates', 'bookings')
        );
    }

    public function store(Request $request)
    {
        MealBooking::where('user_id', auth()->id())->delete();

        if ($request->has('meals')) {

            foreach ($request->meals as $date => $meals) {

                foreach ($meals as $meal) {

                    MealBooking::create([

                        'user_id' => auth()->id(),

                        'meal_date' => $date,

                        'meal' => $meal

                    ]);

                }

            }

        }

        return back()->with('success', 'Meals saved successfully.');
    }
}
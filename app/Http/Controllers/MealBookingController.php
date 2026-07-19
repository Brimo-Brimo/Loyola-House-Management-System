<?php

namespace App\Http\Controllers;

use App\Models\MealBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealBookingController extends Controller
{
    public function index()
    {
        $bookings = MealBooking::where('user_id', Auth::id())
            ->orderBy('meal_date')
            ->get();

        return view('meal-bookings.index', compact('bookings'));
    }

    public function create()
{
    $days = [];

    for ($i = 0; $i < 7; $i++) {

        $days[] = now()->addDays($i);

    }

    $bookings = MealBooking::where('user_id', Auth::id())
        ->whereBetween('meal_date', [
            now()->toDateString(),
            now()->addDays(6)->toDateString()
        ])
        ->get()
        ->keyBy(function ($item) {

            return $item->meal_date . '_' . $item->meal;

        });

    return view(
        'meal-bookings.create',
        compact('days', 'bookings')
    );
}

    public function store(Request $request)
{
    MealBooking::where('user_id', Auth::id())
        ->whereBetween('meal_date', [
            now()->toDateString(),
            now()->addDays(6)->toDateString()
        ])
        ->delete();

    if ($request->has('meals')) {

        foreach ($request->meals as $date => $meals) {

            foreach ($meals as $meal => $value) {

                MealBooking::create([

                    'user_id' => Auth::id(),

                    'meal_date' => $date,

                    'meal' => $meal,

                    'status' => 'Booked'

                ]);

            }

        }

    }

    return redirect()
        ->route('meal-bookings.index')
        ->with('success', 'Meal plan saved successfully.');
}

}
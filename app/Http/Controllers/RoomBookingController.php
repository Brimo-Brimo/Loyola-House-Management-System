<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    public function index()
{
    $rooms = Room::with([
        'building',
        'wing',
        'floor',
        'bookings'
    ])->get();

    $days = [];

    for ($i = 0; $i < 7; $i++) {

        $days[] = now()->addDays($i);

    }

    return view(
        'room-bookings.index',
        compact(
            'rooms',
            'days'
        )
    );
}

    public function create(Request $request)
{
    $room = Room::with('building','wing','floor')
                ->findOrFail($request->room);

    return view('room-bookings.create', compact('room'));
}
    public function store(Request $request)
{
    $validated = $request->validate([

        'room_id'=>'required|exists:rooms,id',

        'check_in_date'=>'required|date',

        'arrival_time'=>'required',

        'check_out_date'=>'required|date|after_or_equal:check_in_date',

        'departure_time'=>'required',

        'purpose'=>'nullable|max:500'

    ]);

    /*
    |--------------------------------------------------------------------------
    | Prevent Double Booking
    |--------------------------------------------------------------------------
    */

    $exists = RoomBooking::where('room_id',$request->room_id)

        ->whereIn('status',['Pending','Approved','Checked In'])

        ->where(function($query) use ($request){

            $query->whereBetween('check_in_date',[
                $request->check_in_date,
                $request->check_out_date
            ])

            ->orWhereBetween('check_out_date',[
                $request->check_in_date,
                $request->check_out_date
            ])

            ->orWhere(function($q) use($request){

                $q->where('check_in_date','<=',$request->check_in_date)

                  ->where('check_out_date','>=',$request->check_out_date);

            });

        })

        ->exists();

    if($exists){

        return back()

        ->withErrors([

            'room'=>'This room is already booked during the selected dates.'

        ])

        ->withInput();

    }

    RoomBooking::create([

        'user_id'=>auth()->id(),

        'room_id'=>$request->room_id,

        'check_in_date'=>$request->check_in_date,

        'arrival_time'=>$request->arrival_time,

        'check_out_date'=>$request->check_out_date,

        'departure_time'=>$request->departure_time,

        'purpose'=>$request->purpose,

        'status'=>'Pending'

    ]);

    return redirect()

        ->route('room-bookings.index')

        ->with('success','Booking submitted for approval.');

}
public function pending()
{
    $bookings = RoomBooking::with([
        'user',
        'room.building',
        'room.wing',
        'room.floor'
    ])
    ->where('status', 'Pending')
    ->orderBy('check_in_date')
    ->get();

    return view('room-bookings.pending', compact('bookings'));
}

public function approve(RoomBooking $roomBooking)
{
    $roomBooking->update([
        'status' => 'Approved'
    ]);

    return back()->with('success', 'Booking approved successfully.');
}

public function reject(RoomBooking $roomBooking)
{
    $roomBooking->update([
        'status' => 'Rejected'
    ]);

    return back()->with('success', 'Booking rejected.');
}
}
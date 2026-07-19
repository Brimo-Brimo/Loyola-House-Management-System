<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class BookingApprovalController extends Controller
{
    public function index()
    {
        $pending = RoomBooking::with([
            'room.building',
            'room.wing',
            'room.floor',
            'user'
        ])
        ->where('status','Pending')
        ->orderBy('check_in_date')
        ->get();

        return view('booking-approvals.index',compact('pending'));
    }

    public function approve(RoomBooking $booking)
    {
        $booking->update([

            'status'=>'Approved'

        ]);

        return back()->with(
            'success',
            'Booking approved successfully.'
        );
    }

    public function reject(RoomBooking $booking)
    {
        $booking->update([

            'status'=>'Rejected'

        ]);

        return back()->with(
            'success',
            'Booking rejected.'
        );
    }
}
<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Building;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Staff;
use App\Models\CommunityMember;
use App\Models\RoomBooking;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [

            'totalMembers' => CommunityMember::count(),

            'totalStaff' => Staff::count(),

            'totalGuests' => Guest::count(),

            'totalRooms' => Room::count(),

            'totalBuildings' => Building::count(),

            'totalBookings' => RoomBooking::count(),

        ]);
    }
}
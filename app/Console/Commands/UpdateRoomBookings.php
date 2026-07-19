<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RoomBooking;

class UpdateRoomBookings extends Command
{
    protected $signature = 'bookings:update';

    protected $description = 'Automatically check in and check out guests';

    public function handle()
    {
        $now = now();

        /*
        |--------------------------------------------------------------------------
        | Automatic Check In
        |--------------------------------------------------------------------------
        */

        RoomBooking::where('status', 'Approved')
            ->whereRaw("TIMESTAMP(check_in_date, arrival_time) <= ?", [$now])
            ->each(function ($booking) {

                $booking->update([
                    'status' => 'Checked In'
                ]);

                $booking->room->update([
                    'status' => 'Occupied'
                ]);

            });

        /*
        |--------------------------------------------------------------------------
        | Automatic Check Out
        |--------------------------------------------------------------------------
        */

        RoomBooking::where('status', 'Checked In')
            ->whereRaw("TIMESTAMP(check_out_date, departure_time) <= ?", [$now])
            ->each(function ($booking) {

                $booking->update([
                    'status' => 'Checked Out'
                ]);

                $booking->room->update([
                    'status' => 'Available'
                ]);

            });

        $this->info('Bookings updated successfully.');

        return Command::SUCCESS;
    }
}
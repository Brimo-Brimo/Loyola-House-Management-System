<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RoomBooking;
use Carbon\Carbon;

class ProcessRoomBookings extends Command
{
    protected $signature = 'loyola:process-bookings';

    protected $description = 'Automatically check in and check out guests';

    public function handle()
    {
        $now = Carbon::now();

        /*
        |--------------------------------------------------------------------------
        | AUTO CHECK-IN
        |--------------------------------------------------------------------------
        */

        RoomBooking::where('status', 'Approved')

            ->whereDate('check_in_date', '<=', $now->toDateString())

            ->whereTime('arrival_time', '<=', $now->format('H:i:s'))

            ->get()

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
        | AUTO CHECK-OUT
        |--------------------------------------------------------------------------
        */

        RoomBooking::where('status', 'Checked In')

            ->whereDate('check_out_date', '<=', $now->toDateString())

            ->whereTime('departure_time', '<=', $now->format('H:i:s'))

            ->get()

            ->each(function ($booking) {

                $booking->update([

                    'status' => 'Checked Out'

                ]);

                $booking->room->update([

                    'status' => 'Available'

                ]);

            });

        $this->info('Bookings processed successfully.');

        return Command::SUCCESS;
    }
}
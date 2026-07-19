<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_bookings', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Room
            |--------------------------------------------------------------------------
            */

            $table->foreignId('room_id')
                  ->constrained()
                  ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | User who made the booking
            |--------------------------------------------------------------------------
            */

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Guest Details
            |--------------------------------------------------------------------------
            */

            $table->string('guest_name');

            $table->string('guest_email')->nullable();

            $table->string('guest_phone')->nullable();

            $table->string('guest_country')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Booking Dates
            |--------------------------------------------------------------------------
            */

            $table->date('check_in_date');

            $table->date('check_out_date');

            $table->time('arrival_time');

            $table->time('departure_time');

            /*
            |--------------------------------------------------------------------------
            | Visit Details
            |--------------------------------------------------------------------------
            */

            $table->integer('number_of_guests')->default(1);

            $table->text('purpose')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->enum('status', [

                'Pending',

                'Approved',

                'Rejected',

                'Checked In',

                'Checked Out',

                'Cancelled'

            ])->default('Pending');

            /*
            |--------------------------------------------------------------------------
            | Approval
            |--------------------------------------------------------------------------
            */

            $table->foreignId('approved_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
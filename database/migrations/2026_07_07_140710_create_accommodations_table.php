<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accommodations', function (Blueprint $table) {

    $table->id();

    // Guest assigned to the room
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    // Room allocated
    $table->foreignId('room_id')->constrained()->cascadeOnDelete();

    // Stay details
    $table->date('arrival_date');
    $table->date('departure_date');

    // Purpose of visit
    $table->string('purpose')->nullable();

    // Reception remarks
    $table->text('remarks')->nullable();

    // Approval
    $table->boolean('approved')->default(false);

    // Check-in / Check-out
    $table->boolean('checked_in')->default(false);
    $table->boolean('checked_out')->default(false);

    // User who approved the booking
    $table->foreignId('approved_by')
          ->nullable()
          ->constrained('users')
          ->nullOnDelete();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};

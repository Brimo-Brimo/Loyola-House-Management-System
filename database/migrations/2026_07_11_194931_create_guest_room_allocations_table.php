<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_room_allocations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('guest_id')->constrained()->cascadeOnDelete();

            $table->foreignId('room_id')->constrained()->cascadeOnDelete();

            $table->date('allocated_from');

            $table->date('allocated_to')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_room_allocations');
    }
};
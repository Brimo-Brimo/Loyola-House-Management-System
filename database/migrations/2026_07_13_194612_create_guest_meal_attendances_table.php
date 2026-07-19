<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_meal_attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('guest_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('meal_date');

            $table->enum('meal', [
                'Lunch',
                'Supper',
            ]);

            $table->enum('status', [
                'Present',
                'Absent',
            ])->default('Present');

            $table->timestamps();

            $table->unique([
                'guest_id',
                'meal_date',
                'meal'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_meal_attendances');
    }
};
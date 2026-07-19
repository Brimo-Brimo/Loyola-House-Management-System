<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('community_member_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('meal_date');

            $table->enum('meal', [
    'Lunch',
    'Supper'
]);

            $table->enum('status', [
                'Present',
                'Absent',
                'Away',
                'Excused'
            ])->default('Present');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_attendances');
    }
};
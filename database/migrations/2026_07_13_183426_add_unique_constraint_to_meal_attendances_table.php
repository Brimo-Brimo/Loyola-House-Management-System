<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('meal_attendances', function (Blueprint $table) {
            $table->unique(
                ['community_member_id', 'meal_date', 'meal'],
                'meal_attendance_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::table('meal_attendances', function (Blueprint $table) {
            $table->dropUnique('meal_attendance_unique');
        });
    }
};
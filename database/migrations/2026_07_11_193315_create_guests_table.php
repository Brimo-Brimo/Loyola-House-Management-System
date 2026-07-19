<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {

            $table->id();

            $table->string('full_name');

            $table->string('gender');

            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('institution')->nullable();

            $table->string('purpose');

            $table->date('check_in');

            $table->date('expected_checkout');

            $table->enum('status', [
                'Checked In',
                'Checked Out'
            ])->default('Checked In');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
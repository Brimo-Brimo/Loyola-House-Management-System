<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('away_notices', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('departure_date');

            $table->time('departure_time')->nullable();

            $table->date('return_date');

            $table->time('return_time')->nullable();

            $table->string('destination');

            $table->text('reason')->nullable();

            $table->enum('status',[
                'Pending',
                'Approved',
                'Rejected',
                'Returned'
            ])->default('Pending');

            $table->foreignId('approved_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('away_notices');
    }
};
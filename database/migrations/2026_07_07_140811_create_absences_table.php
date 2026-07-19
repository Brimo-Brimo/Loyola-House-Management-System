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
    Schema::create('absences', function (Blueprint $table) {

        $table->id();

        $table->foreignId('community_member_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->date('departure_date');

        $table->date('return_date');

        $table->string('destination')->nullable();

        $table->string('reason')->nullable();

        $table->boolean('takes_lunch')->default(false);

        $table->boolean('takes_supper')->default(false);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};

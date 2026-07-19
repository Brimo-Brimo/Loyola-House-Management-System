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
        Schema::create('announcements', function (Blueprint $table) {

    $table->id();

    // Administrator who posted the announcement
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    // Announcement title
    $table->string('title');

    // Full announcement
    $table->text('message');

    // Who should see it
    $table->enum('audience', [
        'Everyone',
        'Community Members',
        'Guests',
        'Kitchen Staff',
        'Reception',
        'Administrators'
    ])->default('Everyone');

    // Display period
    $table->date('start_date');
    $table->date('end_date')->nullable();

    // Whether it is currently visible
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};

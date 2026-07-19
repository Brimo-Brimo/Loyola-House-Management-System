<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {

            $table->boolean('is_pinned')
                  ->default(false)
                  ->after('is_active');

            $table->string('status')
                  ->default('Pending')
                  ->after('is_pinned');

            $table->foreignId('approved_by')
                  ->nullable()
                  ->after('status')
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('approved_at')
                  ->nullable()
                  ->after('approved_by');

        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {

            $table->dropForeign(['approved_by']);

            $table->dropColumn([
                'is_pinned',
                'status',
                'approved_by',
                'approved_at',
            ]);

        });
    }
};
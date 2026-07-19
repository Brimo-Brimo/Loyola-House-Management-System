<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('community_members', function (Blueprint $table) {
            $table->string('other_names')->nullable()->after('first_name');
        });
    }

    public function down(): void
    {
        Schema::table('community_members', function (Blueprint $table) {
            $table->dropColumn('other_names');
        });
    }
};
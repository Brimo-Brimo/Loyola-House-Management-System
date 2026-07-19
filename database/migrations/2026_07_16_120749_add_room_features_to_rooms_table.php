<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {

            $table->string('photo')->nullable()->after('description');

            $table->boolean('wifi')->default(false);

            $table->boolean('ensuite')->default(false);

            $table->boolean('accessible')->default(false);

            $table->boolean('air_conditioned')->default(false);

            $table->boolean('television')->default(false);

            $table->boolean('balcony')->default(false);

            $table->boolean('active')->default(true);

        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {

            $table->dropColumn([
                'photo',
                'wifi',
                'ensuite',
                'accessible',
                'air_conditioned',
                'television',
                'balcony',
                'active'
            ]);

        });
    }
};
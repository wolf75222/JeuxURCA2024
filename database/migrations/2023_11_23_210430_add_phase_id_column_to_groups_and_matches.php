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
        Schema::table('matches', function (Blueprint $table) {
            $table->unsignedBigInteger('phase_id');

            $table->foreign('phase_id')->references('id')->on('phases');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->unsignedBigInteger('phase_id');

            $table->foreign('phase_id')->references('id')->on('phases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['phase_id']);
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['phase_id']);
        });
    }
};

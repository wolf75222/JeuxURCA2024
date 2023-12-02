<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('score_team1')->nullable();
            $table->integer('score_team2')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('score_team1');
            $table->dropColumn('score_team2');
        });
    }
    
};

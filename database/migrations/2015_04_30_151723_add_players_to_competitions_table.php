<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPlayersToCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->integer('players')->after('format_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('players');
        });
    }
}

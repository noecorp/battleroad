<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNickToJoinsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('joins', function (Blueprint $table) {
            $table->string('nick')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('joins', function (Blueprint $table) {
            $table->dropColumn('nick');
        });
    }
}

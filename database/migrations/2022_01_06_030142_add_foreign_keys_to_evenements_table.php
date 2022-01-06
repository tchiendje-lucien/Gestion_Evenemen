<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->foreign(['ID_USER'], 'FK_EVENEMENTS_USERS')->references(['ID_USER'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->dropForeign('FK_EVENEMENTS_USERS');
        });
    }
}

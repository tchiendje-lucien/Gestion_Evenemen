<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->foreign(['ID_EVENT'], 'FK_COMMENTAIRES_EVENEMENTS')->references(['ID_EVENT'])->on('evenements');
            $table->foreign(['ID_USER'], 'FK_COMMENTAIRES_USERS')->references(['ID_USER'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeign('FK_COMMENTAIRES_EVENEMENTS');
            $table->dropForeign('FK_COMMENTAIRES_USERS');
        });
    }
}

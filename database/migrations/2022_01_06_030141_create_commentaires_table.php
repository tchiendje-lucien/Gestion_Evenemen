<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->integer('ID_COMMENTAIRE', true);
            $table->integer('ID_USER')->index('I_FK_COMMENTAIRES_USERS');
            $table->integer('ID_EVENT')->index('I_FK_COMMENTAIRES_EVENEMENTS');
            $table->text('CONTENU_COM');
            $table->boolean('ETAT_COM');
            $table->dateTime('DATE_CREATE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}

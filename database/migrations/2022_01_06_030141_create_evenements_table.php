<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->integer('ID_EVENT', true);
            $table->integer('ID_USER')->index('I_FK_EVENEMENTS_USERS');
            $table->char('TITRE_EVENT');
            $table->text('DESC_EVENT');
            $table->boolean('ETAT_EVENT');
            $table->date('START_EVENT');
            $table->date('END_EVENT')->nullable();
            $table->timestamp('DATE_CREATE', 6);
            $table->timestamp('DATE_UPDATE', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
}

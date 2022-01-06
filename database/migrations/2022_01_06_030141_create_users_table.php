<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('ID_USER', true);
            $table->string('FULL_NAME');
            $table->string('EMAIL', 128);
            $table->string('PASSWORD');
            $table->integer('TELEPHONE')->nullable();
            $table->string('PHOTO_USER')->nullable();
            $table->boolean('ETAT_USER');
            $table->dateTime('DATE_CREATE', 6);
            $table->dateTime('DATE_UPDATE', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

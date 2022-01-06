<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('ID_NOTIFICATION', true);
            $table->integer('ID_USER')->index('I_FK_NOTIFICATIONS_USERS');
            $table->integer('ID_EVENT')->index('I_FK_NOTIFICATIONS_EVENEMENTS');
            $table->text('CONTENU_NOTIF');
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
        Schema::dropIfExists('notifications');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ssid');
            $table->string('equipo');
            $table->string('frecuencia');
            $table->string('ip');
            $table->string('mac_address')->unique();
            $table->string('lugar');
            $table->string('observacion');
            $table->string('modo');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlaces');
    }
}

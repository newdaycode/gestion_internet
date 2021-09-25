<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ssid');
            $table->string('acceso');
            $table->integer('capacidad');
            $table->string('frecuencia');
            $table->string('lugar');
            $table->string('observacion');
            $table->string('ip')->unique();
            $table->string('mac_address')->unique();
            $table->unsignedBigInteger('antenas_id');
            $table->foreign('antenas_id')->references('id')->on('antenas')->onDelete('cascade');
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
        Schema::dropIfExists('torres');
    }
}

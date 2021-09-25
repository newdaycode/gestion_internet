<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cd_rif')->nullable();
            $table->string('nombre_solicitante');
            $table->string('movil');
            $table->string('fijo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('slug')->unique();
            $table->string('ubicacion');
            $table->string('observaciones');
            $table->string('antena');
            $table->string('estado')->default('pendiente');
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
        Schema::dropIfExists('solicituds');
    }
}

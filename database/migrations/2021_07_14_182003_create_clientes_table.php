<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cd_rif')->nullable();
            $table->string('nombre_cliente');
            $table->string('usuario');
            $table->string('movil');
            $table->string('fijo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('ubicacion');
            $table->string('observaciones');
            $table->unsignedBigInteger('servicios_id');
            $table->foreign('servicios_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->date('fecha_i');
            $table->date('fecha_c');
            $table->date('vencido');
            $table->decimal('costo',10,2);
            $table->unsignedBigInteger('torres_id');
            $table->foreign('torres_id')->references('id')->on('torres')->onDelete('cascade');
            $table->decimal('costo_equi',10,2);
            $table->unsignedBigInteger('equipos_id');
            $table->foreign('equipos_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->string('otros_equi');
            $table->decimal('costo_otro_equi',10,2);
            $table->string('ip')->unique();
            $table->string('mac_address')->unique();
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
        Schema::dropIfExists('clientes');
    }
}

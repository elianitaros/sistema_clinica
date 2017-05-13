<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('turno',['mañana','tarde','noche']);
                      
            $table->date('started_at');
            $table->date('finished_at');
            $table->time('hora_i')->format('HH:mm:ss');
            $table->time('hora_f')->format('HH:mm:ss');
            $table->enum('estado', ['habilitado','inhabilitado','eliminado'])->default('habilitado');

            $table->enum('tiempo_consulta',['15','20']);

            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidad')->onDelete('cascade');


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
        Schema::drop('horario');
    }
}


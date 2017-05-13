<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamencomplementarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examencomplementario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',30);
            
            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('hc_id')->unsigned();
            $table->foreign('hc_id')->references('id')->on('historiaclinica')->onDelete('cascade');    

            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');       

             
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
        Schema::drop('examencomplementario');
    }
}

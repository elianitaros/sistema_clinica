<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntginecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antgineco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menarca',20)->nullable();
            $table->string('telarca',20)->nullable();
            $table->string('ritmo_menstrual',20)->nullable();
            $table->enum('dismenorrea',['si','no']);
            $table->date('fum')->nullable();
            $table->integer('parejas')->nullable();
            $table->integer('gesta')->nullable();
            $table->integer('aborto')->nullable();
            $table->integer('parto')->nullable();
            $table->string('cesarea')->nullable();
            $table->date('fup')->nullable();
            $table->string('men_climaterio',10)->nullable();
            $table->enum('metodo_planificacion',['si','no']);
            $table->string('descripcion',20)->nullable();
            $table->enum('pap',['si','no']);
            $table->string('descripcion1',20)->nullable();
            $table->enum('mamografia',['si','no']); 

            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');
            
            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('antgineco');
    }
}

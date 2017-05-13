<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion',50);
            $table->date('fecha_nac');
            $table->enum('genero',['Femenino','Masculino']);
            $table->string('ocupacion',50);
            $table->string('origen',50);
            $table->integer('telef')->nullable;
            $table->integer('celular');
            $table->enum('estado_civil',['soltero(a)','casado(a)','viudo(a)','union libre']);
            $table->string('caso_emergencia',100);
            $table->integer('telf_opcional');
            $table->enum('estado',['habilitado','inahbilitado','eliminado']);
            $table->integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
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
        Schema::drop('paciente');
    }
}

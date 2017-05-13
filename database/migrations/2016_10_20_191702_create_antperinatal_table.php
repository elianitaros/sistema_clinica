<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntperinatalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antperinatal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_hijo');
            $table->integer('meses_gestacion');
            $table->enum('sitio_nac',['domicilio','hospital','c/s puesto de salud','otros']);
            $table->string('descripcion',20)->nullable();
            $table->enum('tipo_nac',['parto','cesarea']);
            $table->float('talla');
            $table->float('peso');
            $table->enum('problemas_nac',['si','no']);
            $table->string('especificacion',50)->nullable();
            
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
        Schema::drop('antperinatal');
    }
}

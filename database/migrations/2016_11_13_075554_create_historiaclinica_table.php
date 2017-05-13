<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaclinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('talla')->nullable();
            $table->string('presion')->nullable();
            $table->enum('grados',['°C'])->nullable();
            $table->string('temperatura')->nullable();
            $table->string('peso')->nullable();
            $table->text('subjetivo')->nullable();
            $table->text('objetivo')->nullable();
            $table->text('analisis')->nullable();
            $table->text('plan')->nullable();

            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');

            $table->integer('antecedente_id')->nullable();
            
            $table->integer('antheredfamiliar_id')->nullable();
            
            $table->integer('antpersonal_id')->nullable();
            
            $table->integer('antgineco_id')->nullable();

            $table->integer('antperinatal_id')->nullable();
            
            $table->integer('medico_id');
                        
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
        Schema::drop('historiaclinica');
    }
}

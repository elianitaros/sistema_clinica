<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntheredfamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antheredfamiliar', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cardiovascular')->nullable();
            $table->string('descripcion',30)->nullable();
            $table->text('endrocrino')->nullable();
            $table->string('descripcion1',30)->nullable();
            $table->text('neurologico')->nullable();
            $table->string('descripcion2',30)->nullable();
            $table->text('respiratorio')->nullable();
            $table->string('descripcion3',30)->nullable();
            $table->text('neoplasico')->nullable();
            $table->string('descripcion4',30)->nullable();

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
        Schema::drop('antheredfamiliar');
    }
}

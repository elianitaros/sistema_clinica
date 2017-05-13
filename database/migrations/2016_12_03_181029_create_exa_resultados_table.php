<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exa_resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('imagen',100);

            $table->integer('hc_id')->unsigned();
            $table->foreign('hc_id')->references('id')->on('historiaclinica')->onDelete('cascade');
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
        Schema::drop('exa_resultados');
    }
}

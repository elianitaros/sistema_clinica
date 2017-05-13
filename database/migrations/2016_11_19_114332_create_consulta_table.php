<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('medico_id')->unsigned();            
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('hc_id')->unsigned();
            $table->foreign('hc_id')->references('id')->on('historiaclinica')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consulta');
    }
}

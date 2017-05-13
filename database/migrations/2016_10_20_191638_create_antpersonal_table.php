<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntpersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antpersonal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a',100)->nullable();
            $table->string('quirurgicos',100)->nullable();
            $table->string('transfusionales',100)->nullable();
            $table->string('traumaticos',100)->nullable();
            $table->string('hospitalizaciones_previas',100)->nullable();
            $table->string('descripcion',100)->nullable();
            $table->enum('tabaquismo',['si','no','a veces']);
            $table->enum('alcohol',['si','no','a veces']);
            $table->enum('drogas',['si','no','aveces']);
            $table->enum('inmunizaciones',['completas a edad','pendientes','otros']);
            $table->string('descripcion1',30)->nullable();
            $table->string('descripcion2',30)->nullable();
            $table->string('descripcion3',30)->nullable();
            $table->text('enfermedad_infecciosa');            
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
        Schema::drop('antpersonal');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diagnostico',50)->nullable();
            $table->text('hematologia')->nullable();
            $table->text('hormonas')->nullable();
            $table->text('marcadores')->nullable();
            $table->text('bioquimica')->nullable();
            $table->text('orina')->nullable();
            $table->text('tincion_gram')->nullable();
            $table->text('serologia')->nullable();
            $table->text('microbiologia')->nullable();
            $table->text('citologia')->nullable();
            $table->text('preoperatorio')->nullable();
            $table->text('parasitologia')->nullable();


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
        Schema::drop('laboratorio');



    }
}

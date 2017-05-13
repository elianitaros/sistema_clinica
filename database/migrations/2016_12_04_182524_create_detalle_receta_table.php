<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_receta', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('producto_id');
            $table->string('nombre_generico');
            $table->decimal('precio',10,2);
            $table->string('unidad');
            $table->integer('receta_id')->nullable();
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
        Schema::drop('detalle_receta');
    }
}

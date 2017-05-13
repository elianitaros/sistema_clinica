<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 25)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->enum('type',['admin','medico','fichaje']);
            $table->enum('estado', ['habilitado', 'inhabilitado', 'eliminado'])->default('habilitado');
            $table->integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->integer('especialidad_id')->nullable();            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

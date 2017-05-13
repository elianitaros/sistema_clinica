<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{

	Route::resource('usuarios', 'Admin\UsuarioController');

	Route::resource('horarios', 'Admin\HorarioController');

	Route::resource('especialidades' ,'Admin\EspecialidadController');

	Route::resource('medicos' ,'Admin\MedicoController');
	
	Route::get('resetear/{id}', 'ProfileController@reset');

	

});

	Route::group(['prefix' => 'reportes'], function(){
	
	Route::get('usuarios', 'Reportes\AdminController@usuarios');
});
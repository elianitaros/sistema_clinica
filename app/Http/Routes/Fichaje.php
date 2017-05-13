<?php

Route::group(['prefix' => 'fichaje', 'middleware' => ['auth','fichaje' ]], function(){

	Route::resource('pacientes', 'Fichaje\PacienteController');
	
	Route::resource('citas', 'Fichaje\CitaController');

	Route::get('data/medicos/{id}', 'Fichaje\DataController@medicos');

	Route::get('data/citas/{medicos}', 'Fichaje\DataController@citas');

	
	/**
	*	Reports
	*/
	Route::post('reportes/cita','Reportes\FichajeController@citas');
	Route::get('reportes/cita','Reportes\FichajeController@cita');

});

Route::group(['prefix' => 'fichaje/reportes', 'middleware' => ['auth','fichaje' ]], function(){
	
	Route::get('citas','Reportes\FichajeController@citasView');
	Route::post('citas','Reportes\FichajeController@citasData');

});
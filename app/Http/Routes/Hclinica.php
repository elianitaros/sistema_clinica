<?php

Route::group(['prefix' => 'hclinica', 'middlware' => ['auth','medico']], function(){

	Route::get('antcreate/{id}', 'Hclinica\AntecedenteController@create');
	Route::post('antstore/{id}', 'Hclinica\AntecedenteController@store');
	Route::get('/g', 'Hclinica\ConsultaController@index');
	Route::get('create/{id}', 'Hclinica\ConsultaController@create');
	Route::post('store/{id}', 'Hclinica\ConsultaController@store');
	Route::get('show/{id}', 'Hclinica\ConsultaController@show');
	Route::get('solicitud/{id}', 'Hclinica\ConsultaController@solicitud');


	Route::get('labcreate/{id}', 'Hclinica\LaboratorioController@create');
	Route::post('labstore/{id}', 'Hclinica\LaboratorioController@store');
	Route::get('labshow/{id}', 'Hclinica\LaboratorioController@show');

	
	Route::get('exacreate/{id}', 'Hclinica\ExamenController@create');
	Route::post('exastore/{id}', 'Hclinica\ExamenController@store');

	Route::get('reccreate/{id}', 'Hclinica\RecetaController@create');
	Route::post('recstore/{id}', 'Hclinica\RecetaController@store');
	Route::get('recshow/{id}', 'Hclinica\RecetaController@show');
	
	Route::get('resulcreate/{id}', 'Hclinica\ExaResultadoController@create');
	Route::post('resulstore/{id}', 'Hclinica\ExaResultadoController@store');
	
	Route::get('finalizar','Hclinica\ConsultaController@finalizar');

	Route::get('impreceta/{id}','Reportes\AdminController@receta');
	Route::get('implab/{id}','Reportes\AdminController@laboratorio');
	Route::get('impexa/{id}','Reportes\AdminController@examen');

	Route::get('citas','Reportes\AdminController@citas');
	Route::post('citas','Reportes\AdminController@citaspdf');
});
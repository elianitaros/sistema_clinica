<?php

use Illuminate\Database\Seeder;


class EspecialidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Modelos\Admin\Especialidad::class)->create([
            'nombre' 	=>	'pediatria',
	        'estado' 	=> 	'habilitado',
    	]);
    	factory(App\Modelos\Admin\Especialidad::class)->create([
            'nombre' 	=>	'ginecologia',
	        'estado' 	=> 	'habilitado',
    	]);
    	factory(App\Modelos\Admin\Especialidad::class)->create([
            'nombre' 	=>	'medicina general',
	        'estado' 	=> 	'habilitado',
    	]);
        //factory(App\Modelos\Admin\Especialidad::class)->times(50)->create();
    }
}

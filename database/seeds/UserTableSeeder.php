<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class)->create([
    		'username' 	=>	'admin',
	        'email' 	=> 	'admin@gmail.com',
	        'password' 	=> 	bcrypt('admin'),
	        'type'		=> 	'admin',
	        'estado' 	=> 	'habilitado',
	        'people_id' => 	1,
	        'remember_token' => str_random(10)
    	]);

        factory(App\User::class)->create([
            'username'  =>  'dieguito',
            'email'     =>  'diego@gmail.com',
            'password'  =>  bcrypt('admin'),
            'type'      =>  'medico',
            'estado'    =>  'habilitado',
            'especialidad_id' => 1,
            'people_id' =>  2,
            'remember_token' => str_random(10)
        ]);

        factory(App\User::class)->create([
            'username'  =>  'anahi123',
            'email'     =>  'ana@gmail.com',
            'password'  =>  bcrypt('admin'),
            'type'      =>  'medico',
            'estado'    =>  'habilitado',
            'especialidad_id' => 2,
            'people_id' =>  3,
            'remember_token' => str_random(10)
        ]);
        factory(App\User::class)->create([
            'username'  =>  'luis',
            'email'     =>  'luis@gmail.com',
            'password'  =>  bcrypt('admin'),
            'type'      =>  'medico',
            'estado'    =>  'habilitado',
            'especialidad_id' => 2,
            'people_id' =>  4,
            'remember_token' => str_random(10)
        ]);

        factory(App\User::class)->times(50)->create();
    }
}

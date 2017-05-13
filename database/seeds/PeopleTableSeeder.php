<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\People::class)->create([
        	'name' => 'Admin',
        	'firstname' => 'istrator',
        	'lastname' => 'administrator'
        ]);
        factory(App\People::class)->create([
            'name' => 'diego',
            'firstname' => 'quintanilla',
        ]);
        factory(App\People::class)->create([
            'name' => 'Anahi',
            'firstname' => 'Iporre',
            'lastname' => 'Quintanilla'
        ]);
        factory(App\People::class)->create([
            'name' => 'Luis',
            'name' => 'Santamaria'
        ]);

    }
}
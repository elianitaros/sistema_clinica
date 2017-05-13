<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\People::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('es_ES');
    return [
        'name' => $faker->name,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'ci' => $faker->randomNumber
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('es_ES');
    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'password' => bcrypt('users'),
        'type'  => $faker->randomElement(['admin', 'fichaje']),
        'estado' => $faker->randomElement(['habilitado']),
        'people_id' => function(){
            return factory(App\People::class)->create()->id;
        },
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Modelos\Admin\Especialidad::class, function (Faker\Generator $faker){
    $faker = Faker\Factory::create('es_ES');
    return [
        'nombre' => $faker->name,
        'estado' => $faker->randomElement(['habilitado']),
        'color' =>  $faker->hexcolor
    ];
});

$factory->define(App\Modelos\Fichaje\Paciente::class, function (Faker\Generator $faker){
    $faker = Faker\Factory::create('es_ES');
    return [
        'direccion'   => $faker->streetAddress,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'genero'       => $faker->randomElement(['Femenino','Masculino']),
        'ocupacion'       => $faker->jobTitle,
        'origen'    => $faker->city,
        'telef' => $faker->randomNumber,
        'celular' =>  $faker->randomNumber($nbDigits = NULL),
        'estado_civil'=> $faker->randomElement(['soltero(a)','casado(a)','viudo(a)','union libre']),
        'caso_emergencia' =>  $faker->name,
        'telf_opcional' =>  $faker->randomNumber,
        'estado' => $faker->randomElement(['habilitado']),
        'people_id' => function(){
            return factory(App\People::class)->create()->id;
        }
    ];
});
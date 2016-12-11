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

//Aca definimos como crearemos los datos, aca se define la forma como se crean
/*
//Se comenta este que viene por defecto
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/


//Se definen los 4 métodos para crear el factory de información fake:falsa que permita visualizar algo mas real el sitio
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->email,
      'password' => bcrypt('secret'),
      'remember_token' => str_random(10),
      'role' => $faker->randomElement(['user', 'editor']),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
      'title' => $faker->sentence(),
      'body' => $faker->paragraph(),
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    return [
      'title' => $faker->sentence(),
      'body' => $faker->paragraph(),
    ];
});

$factory->define(App\Multimedia::class, function (Faker\Generator $faker) {
    return [
      'title' => $faker->sentence(),
      'body' => $faker->paragraph(),
    ];
});
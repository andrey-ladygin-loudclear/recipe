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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Ingredient;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Model\Ingredient::class, function (Faker\Generator $faker) {

    $icons = scandir(public_path().Ingredient::$dir);

    while(in_array($icon = $icons[array_rand($icons)], ['.','..'])) {}

    return [
        'name' => $faker->name,
        'icon' => $icon,
        'description' => $faker->text,
    ];
});

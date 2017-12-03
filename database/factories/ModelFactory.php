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
use App\Model\Receipt;
use App\Model\User;

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
        'email' => 'admin@receipt.com',
        'password' => $password ?: $password = bcrypt('admin'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Model\Receipt::class, function (Faker\Generator $faker) {

    $icons = scandir(public_path().Receipt::$dir);
    while(in_array($icon = $icons[array_rand($icons)], ['.','..'])) {}

    return [
        'user_id' => User::all()->first()->id,
        'name' => $faker->name,
        'icon' => $icon,
        'description' => $faker->text,
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

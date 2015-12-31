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

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->title,
    ];
});

$factory->define(App\Note::class,function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Student::class,function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'address' => $faker->address,
    ];
});

$factory->define(App\Message::class,function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'body' => $faker->paragraph,
    ];
});


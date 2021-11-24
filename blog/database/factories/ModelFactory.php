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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'country_id' => 1
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => 1,
        'title' => $faker->sentence(7,11),
        'content' => $faker->paragraphs(rand(10, 15), true),
        'path' => "placeholder.png",
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->randomElement(['admin', 'subscriber'])
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'path' => 'placeholder.jpg',
        'imageable_id' => 1,
        'imageable_type' => 'photo'
    ];
});

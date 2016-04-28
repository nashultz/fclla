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

$factory->define(FCLLA\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(FCLLA\Post::class, function (Faker\Generator $faker) {
    return [
        'author_id' => '1',
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'excerpt' => $faker->paragraph,
        'body' => $faker->paragraphs,
        'published_at' => $faker->dateTime
    ];
});

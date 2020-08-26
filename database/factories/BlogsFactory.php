<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'body' => $faker->sentence(100),
    ];
});

// We are copying it from UserFactory because it is the same
/* $factory->define(User::class, function (Faker $faker) {
*return [
*'name' => $faker->name,
*'email' => $faker->unique()->safeEmail,
*'email_verified_at' => now(),
*'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
*'remember_token' => Str::random(10),
];
}); */

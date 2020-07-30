<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$users = User::all()->pluck('id')->toArray();

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement($users),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
    ];
});

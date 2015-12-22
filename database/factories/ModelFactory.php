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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10) ,
        'birthday' => date('Y-m-d'),
        'gender' => 'm' ,
        'zip_code' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'number' => $faker->numberBetween(1,1000),
        'city' => $faker->city,
        'state' => $faker->city,
        'complement' => $faker->locale,
        'term_read' => 1,
        'newsletter' => 1,
        'newsletter' => bcrypt(str_random(10))

    ];
});

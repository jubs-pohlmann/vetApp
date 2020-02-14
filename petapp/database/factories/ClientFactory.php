<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
      'cpf' => $faker->cpf,
      'birthdate' => $faker->date($format = 'd-m-Y', $max = 'now'),
      'user_id' => factory('App\User')->create()->id,
    ];
});

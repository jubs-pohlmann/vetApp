<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use Faker\Generator as Faker;
use App\Store;
use Illuminate\Support\Str;

$factory->define(Store::class, function (Faker $faker) {
    return [
    'cnpj' => $faker->cnpj,
    'delivery' => $faker->boolean,
    'user_id' => factory('App\User')->create()->id,
    ];
});

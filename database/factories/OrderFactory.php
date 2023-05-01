<?php

use App\Order;
use Faker\Generator as Faker;


$factory->define(Order::class, function (Faker $faker) {

    $price = rand(10000,900000000);
    $users = \App\User::pluck('id'); 
    $users_count =  count($users);

    return [
        'totalprice' => $price,
        'totaldiscount' => ($price * rand(1,30)) / 1000 , 
        'user_id' => $users[rand(0,$users_count - 1)],
        'status' => rand(0,1),
        'created_at' => $faker->dateTimeBetween('-2 months','now'),
    ];
});

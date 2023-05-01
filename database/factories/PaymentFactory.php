<?php

use illuminate\support\Str;
use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
  
    $orders = \App\Order::pluck('id');
    $orders_count = count($orders);

    $status = [0,1,1,1,1,0,1];
    $status_count = count($status);
    
    return [
        'authority' => Str::random(25),
        'RefID' => rand(111111111,999999999),
        'status'=> $status[rand(0,$status_count-1)],
        'order_id'=> $orders[rand(0,$orders_count-1)],
        'created_at' => $faker->dateTimeBetween('-6 months','now'),
    ];

});

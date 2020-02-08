<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->realText(),
        'price'=>$faker->randomFloat(2,1.0,100.99),
        'discount'=>$faker->randomFloat(2,1.0,30.99),
        'stock'=>$faker->numberBetween(20,100),
        'img_url_1'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_2'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_3'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_4'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_5'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_6'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_7'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
        'img_url_8'=>'public/img/product0'.$faker->numberBetween(1,9).'.png',
    ];
});

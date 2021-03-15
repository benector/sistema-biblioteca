<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exemplary;
use Faker\Generator as Faker;
use App\Work;


$factory->define(Exemplary::class, function (Faker $faker) {
    return [
            'work_id' => factory(\App\Work::class),
            'code' => $faker->ean13(),
        ];
    });
    

    // $factory->afterCreating(Work::class, function ($work, Faker $faker) {
    //     $work->exemplaries()->save(factory(App\Exemplary::class)->make());
    // });

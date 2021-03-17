<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Exemplary;
use App\Work;

$work = factory(Work::class,1)->create();
echo $work[0]->id;
$factory->define(Exemplary::class, function (Faker $faker) {
    return [
            'work_id' => $work[0]->id,
            'code' => $faker->ean13(),
        ];
    });
    

    // $factory->afterCreating(Work::class, function ($work, Faker $faker) {
    //     $work->exemplaries()->save(factory(App\Exemplary::class)->make());
    // });

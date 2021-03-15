<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Work;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Work::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'subject_id' => 1,
        'title' => $faker->word,
        'authors' => $faker->words($nb = 3, $asText = true),
        'edition' => (string)$faker->randomNumber($nbDigits = 2) . " edição",
        'resume' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'img' => $faker->imageUrl($width = 400, $height = 600) ,
        'pages' => $faker->numberBetween($min = 10, $max = 400),
        'ano' => $faker->year($max = 'now'),

    ];
});

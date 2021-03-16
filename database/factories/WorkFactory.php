<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Work;
use App\Category;
use App \Subject;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Work::class, function (Faker $faker) {
    $category = factory(Category::class,1)->create();
    $subject= factory(Subject::class,1)->create();
    
    return [
        'category_id' => $category[0]->id,
        'subject_id' => $subject[0]->id,
        'title' => $faker->word,
        'authors' => $faker->words($nb = 3, $asText = true),
        'edition' => (string)$faker->randomNumber($nbDigits = 2) . " edição",
        'resume' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'img' =>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn8IyMI21gVgBne4lZ4jECqi30jXFZ65f_8w&usqp=CAU",
        'pages' => $faker->numberBetween($min = 10, $max = 400),
        'year' => $faker->numberBetween($min = 1910, $max = 2021),

    ];
});
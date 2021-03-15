<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Facades\DB;
use App\Course;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\Youtube;




    $factory->define(Course::class, function (Faker $faker) {
    $faker->addProvider(new Youtube($faker));
    return [
        'category_id' => factory(\App\Category::class),
        'name' => $faker->sentence,
        'slug' => $faker->word,
        'description' => $faker->paragraph,
        'img_link' => $faker->imageUrl($width = 640, $height = 480) ,
        'video' => $faker->youtubeEmbedUri(),
    ];
    });

    $factory->afterCreating(Course::class, function ($course, Faker $faker) {
        $course->users()->save(factory(App\User::class)->make());
    });
   

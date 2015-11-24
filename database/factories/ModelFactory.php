<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Phase::class,  function(Faker\Generator $faker){

    return [
        'phase' => $faker->name
    ];

});

$factory->define(App\Model\Intervention::class, function(Faker\Generator $faker){

    return [
        'user_id'
    ];

});

$factory->define(App\Model\Question::class, function(Faker\Generator $faker){
    return [
        'question_text' => $faker->sentence(15),
        'question_type' => rand(1,5),
        'phase_id' => rand(1,4),
        'blurb_data' => $faker->paragraph(4),
        'sequence_number' => rand(1,10)
    ];
});

$factory->define(App\Model\Question_Option::class, function(Faker\Generator $faker){
    return [
        'answer_text' => $faker->sentence(15)
    ];
});

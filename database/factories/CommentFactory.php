<?php

/** @var Factory $factory */

use App\Models\Comment;
use App\Models\Question;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text(255),
        'question_id' => Question::all()->random()->id,
        'created_by' => User::all()->random()->id,
    ];
});

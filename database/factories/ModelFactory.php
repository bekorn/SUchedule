<?php

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Models factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker)
{
    return [
        'given_name' => $faker->firstName(),
        'family_name' => $faker->lastName(),
        'email' => function ($self) {
            return $self['given_name'] . $self['family_name'] . '@sabanciuniv.edu';
        },
        'avatar_url' => 'http://lorempixel.com/240/240/people',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Instructor::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name(),
        'email' => function ($self) {
            return str_replace( ' ', '.', $self['name'] ) . '@sabanciuniv.edu';
        },
    ];
});

$factory->define(App\Models\Requirement::class, function (Faker\Generator $faker)
{
    static $max = 30;
    static $counter = 0;
    $counter++;

    return [
        'course_code' => $counter * 100,
        'requirement' => $faker->numberBetween(0, $max) * 100,
    ];
});

$factory->define(App\Models\Course::class, function (Faker\Generator $faker)
{
    static $counter = 0;
    $counter++;

    return [
        'cdn' => $counter,
        'term' => 'Fall 2016-2017',
        'code' => $counter * 100,
        'title' => $faker->text(30),
        'section' => $faker->randomLetter(),
        'type' => 'course',
        'faculty' => $faker->randomElement(['FMAN', 'FASS', 'FENS']),
        'ECTS' => $faker->randomDigit(),
        'su_credit' => $faker->randomDigit(),
        'capacity' => $faker->numberBetween(20, 100),
        'remaining' => function(array $self) { return $self['capacity']; },
        'catalog_entry_link' => null,
        'detailed_information_link' => null,
        'rating' => $faker->randomFloat(null, 5.0, 1.0),
        'number_of_ratings' => $faker->numberBetween(5, 25),
    ];
});

$factory->define(App\Models\Meeting::class, function (Faker\Generator $faker)
{
    return [
        'day' => $faker->randomElement(['M', 'T', 'W', 'R', 'F']),
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'type' => 'meeting',
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'schedule_type' => 'schedule_type',
    ];
});

$factory->define(App\Models\Review::class, function (Faker\Generator $faker)
{
    return [
        'body' => $faker->text(),
        'course_rating' => $faker->numberBetween( 1, 5 ),
        'instructor_rating' => $faker->numberBetween( 1, 5 ),
    ];
});

$factory->define(App\Models\MonoSchedule::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->text(25),
        'description' => $faker->text(),
    ];
});

$factory->define(App\Models\PolySchedule::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->text(25),
        'description' => $faker->text(),
    ];
});
<?php

$factory->define(App\IncomeCategory::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});

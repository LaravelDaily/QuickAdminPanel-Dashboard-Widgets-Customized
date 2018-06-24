<?php

$factory->define(App\ExpenseCategory::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});

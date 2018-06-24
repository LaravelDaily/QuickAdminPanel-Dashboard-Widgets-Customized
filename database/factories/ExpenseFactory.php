<?php

use App\ExpenseCategory;
use Carbon\Carbon;
use App\Expense;

$factory->define(Expense::class, function (Faker\Generator $faker) {

    $date = $faker->dateTimeBetween(Carbon::now()->subMonth(11), Carbon::now());

    return [
        "expense_category_id" => ExpenseCategory::all()->random(1)->first()->id,
        "entry_date" => $date->format('Y-m-d'),
        "amount" => $faker->randomFloat(2, 1, 100),
        "created_at" => $date,
        "updated_at" => $date
    ];
});

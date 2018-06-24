<?php

use Illuminate\Database\Seeder;
use App\ExpenseCategory;

class ExpenseCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ExpenseCategory::class, 5)->create();
    }
}

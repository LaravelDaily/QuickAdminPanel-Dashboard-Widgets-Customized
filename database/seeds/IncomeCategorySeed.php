<?php

use Illuminate\Database\Seeder;
use App\IncomeCategory;

class IncomeCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IncomeCategory::class, 5)->create();
    }
}

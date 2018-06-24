<?php

use Illuminate\Database\Seeder;
use App\Expense;

class ExpenseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Expense::class, 100)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Income;

class IncomeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Income::class, 100)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(IncomeCategorySeed::class);
        $this->call(ExpenseCategorySeed::class);
        $this->call(ExpenseSeed::class);
        $this->call(IncomeSeed::class);
    }
}

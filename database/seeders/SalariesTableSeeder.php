<?php

use App\Models\Salary;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    public function run()
    {
        Salary::factory(100)->create();
    }
}

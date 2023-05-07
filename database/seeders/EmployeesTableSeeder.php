<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::factory(50)->create();
        // Note::factory(50)->create();

    }
}

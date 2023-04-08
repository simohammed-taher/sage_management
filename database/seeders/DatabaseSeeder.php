<?php

// database/seeders/DatabaseSeeder.php

// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Leave;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Generate test data for each model
        Employee::factory(10)->create();
        Salary::factory(30)->create();
        Leave::factory(20)->create();
        Client::factory(5)->create();
        Project::factory(15)->create();
        Task::factory(50)->create();
    }
}

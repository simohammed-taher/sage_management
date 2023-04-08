<?php

use App\Models\Leave;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    public function run()
    {
        Leave::factory(100)->create();
    }
}

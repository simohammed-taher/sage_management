<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        Client::factory(30)->create();
    }
}

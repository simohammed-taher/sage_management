<?php

// database/factories/ProjectFactory.php
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['not_started', 'in_progress', 'completed']),
        ];
    }
}

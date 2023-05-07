<?php
// database/factories/EmployeeFactory.php
namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'position' => $this->faker->randomFloat(2, 1000, 10000),
            'image' => "https://loremflickr.com/640/480/people?random=" . rand(1, 10000),

        ];
    }
}

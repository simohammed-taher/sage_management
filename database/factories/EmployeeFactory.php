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
            'position' => $this->faker->numberBetween($min = 8, $max =20 ),
            'image' => "https://loremflickr.com/640/480/people?random=" . rand(1, 10000),

        ];
    }
}

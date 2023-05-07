<?php
// database/factories/SalaryFactory.php
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    protected $model = Salary::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'pay_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}

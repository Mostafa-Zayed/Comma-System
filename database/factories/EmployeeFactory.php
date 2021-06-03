<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->firstName('male'),
            'email' => $this->faker->safeEmail,
            'ssn' => $this->faker->numberBetween(10000,1000000),
            'password' => bcrypt('password'),
            'type' => $this->faker->randomElement([false,true]),
            'active' => $this->faker->randomElement(['active','not active'])
        ];
    }
}

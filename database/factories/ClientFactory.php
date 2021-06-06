<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName().' '.$this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'ssn' => str_shuffle('lksdjfeirhg'.$this->faker->numberBetween(123,123232132)),
            'phone' => $this->faker->phoneNumber,
            'job' => $this->faker->jobTitle,
            'status' => $this->faker->randomElement(['on','off']),
            'employee_id' => Employee::select('id')->get()->random()->id
        ];
    }
}

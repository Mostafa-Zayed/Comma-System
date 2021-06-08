<?php

namespace Database\Factories;

use App\Models\Shared;
use Illuminate\Database\Eloquent\Factories\Factory;

class SharedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shared::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => rand(200,1000),
            'max_hours' => 6,
            'employee_id' => \App\Models\Employee::select('id')->get()->random()->id,
            'status' => $this->faker->randomElement(['on','off'])
        ];
    }
}

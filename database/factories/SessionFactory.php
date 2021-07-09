<?php

namespace Database\Factories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start' => now(),
            'end'   => $this->faker->dateTimeBetween('now', '+ 30 minutes'),
            'quantity' => 30,
            'product' => rand(22, 234),
            'status' => $this->faker->randomElement(['finished', 'not_start', 'progress']),
            'type_id' => \App\Models\Type::select('id')->get()->random()->id,
            'employee_id' => \App\Models\Employee::select('id')->get()->random()->id,
            'client_id' => \App\Models\Employee::select('id')->get()->random()->id
        ];
    }
}

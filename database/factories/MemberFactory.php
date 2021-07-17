<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start' => $this->faker->dateTime,
            'end'   => $this->faker->dateTime,
            'client_id' => \App\Models\Client::select('id')->get()->random()->id,
            'employee_id' => \App\Models\Employee::select('id')->get()->random()->id,
            'member_type_id' => \App\Models\MemberType::select('id')->get()->random()->id
        ];
    }
}

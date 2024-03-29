<?php

namespace Database\Factories;

use App\Models\MemberType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['Monthly', 'weekly', '10 days', '15 days'];
        $days  = [30, 7, 10, 15];
        $status = ['on', 'off'];
        static $counter = 0;
        return [
            'name' => $types[$counter++],
            'days' => $days[$counter - 1],
            'status' => $status[array_rand($status)],
            'price' => rand(0, 1000),
            'employee_id' => \App\Models\Employee::select('id')->get()->random()->id

        ];
    }
}

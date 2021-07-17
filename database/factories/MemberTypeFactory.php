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
        $types = ['Monthly','weekly','10 days','15 days'];
        $status = ['on','off'];
        static $counter = 0;
        return [
            'name' => $types[$counter++],
            'status' => $status[array_rand($status)],
            'employee_id' => \App\Models\Employee::select('id')->get()->random()->id
        ];
    }
}

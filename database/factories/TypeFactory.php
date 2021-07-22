<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type::class;
    protected $types = ['funny', 'shared', 'reservation', 'package'];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // foreach ($this->types as $key => $type) {
        //     unset($this->types[$key]);
        //     return [
        //         'name' => $type,
        //        'price' => ,
        //         'status' => $this->faker->randomElement(['on','off'])
        //     ];

        // }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['funny', 'shared', 'reservation', 'package'];
        $prices = [20, 40, 50, 30];
        $status = ['on', 'off'];
        $counter = 0;

        foreach ($types as $type) {
            Type::create([
                'name' => $type,

                'price' => $prices[$counter++],

                'status' => $status[array_rand($status)]
            ]);
        }
    }
}

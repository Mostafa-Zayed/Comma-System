<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MemberType::factory(4)->create();
    }
}

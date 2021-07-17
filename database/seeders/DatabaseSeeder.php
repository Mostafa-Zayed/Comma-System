<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Employee::factory(10)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\Room::factory(20)->create();
        \App\Models\Type::factory(4)->create();
        \App\Models\Shared::factory(1)->create();
        \App\Models\Session::factory(10)->create();
        $this->call(MemberTypeSeeder::class);
        $this->call(MemberSeeder::class);

    }
}

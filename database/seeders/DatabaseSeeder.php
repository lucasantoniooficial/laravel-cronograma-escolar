<?php

namespace Database\Seeders;

use App\Models\Team;
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
//        $this->call([
//            WeekSeeder::class,
//            RoleSeeder::class,
//            UserSeeder::class
//        ]);

        Team::factory(100)->create();
    }
}

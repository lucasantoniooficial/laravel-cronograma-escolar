<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name' => 'Admin',
           'email' => 'admin@email.com',
           'password' => 123
       ])->roles()->attach(1);

        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@email.com',
            'password' => 123
        ])->roles()->attach(2);
    }
}

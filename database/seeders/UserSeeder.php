<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('password'),
            'phone' => '+40734124908',
            'address' => 'Bucuresti',
            'role' => 'admin'
        ]);
        \App\Models\User::factory(100)->create();
    }
}

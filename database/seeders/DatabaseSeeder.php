<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
         \App\Models\User::factory(100)->create();
         User::create([
             'name' => 'Administrator',
             'email' => 'admin@gmail.com',
             'password'=>bcrypt('password'),
             'phone' => '+40734124908',
             'address' => 'Bucuresti',
             'role' => 'admin'
             ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

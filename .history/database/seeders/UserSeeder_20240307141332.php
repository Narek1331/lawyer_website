<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('12345678$'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane1@example.com',
            'password' => bcrypt('jane1@example.com'),
        ]);

    }
}

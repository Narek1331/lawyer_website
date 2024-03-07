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
            'name' => 'Մխիթար Տիգրանյան',
            'email' => 'tigranyan@example.com',
            'password' => bcrypt('12345678$'),
        ]);

        User::create([
            'name' => 'Սեյրան Մարտիրոսյան',
            'email' => 'martirosyan@example.com',
            'password' => bcrypt('12345678$'),
        ]);

    }
}

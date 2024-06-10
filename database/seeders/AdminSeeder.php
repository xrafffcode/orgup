<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'admin@orgup.my.id',
            'password' => bcrypt('password'),
        ]);

        $user->admin()->create([
            'name' => 'Admin',
            'username' => 'admin',
        ]);

        $user->assignRole('admin');
    }
}

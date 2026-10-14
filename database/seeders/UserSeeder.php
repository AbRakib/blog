<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'phone' => '123-456-7890',
            'address' => '123 Main St, City, State 12345',
            'password' => bcrypt('12345678'),
        ]);
    }
}

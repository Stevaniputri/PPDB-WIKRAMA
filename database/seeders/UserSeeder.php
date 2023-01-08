<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


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
            'email' => 'stevani@gmail.com',
            'name' => 'stevani',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
    }
}

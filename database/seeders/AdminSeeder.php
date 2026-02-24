<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Bob",
            'email' => 'bob@mail.com',
            'password' => Hash::make('password'),
            'address' => "Yangon, Myanmar",
            'phone' => '09888888888',
            'gender' => 'male',
        ]);
    }
}

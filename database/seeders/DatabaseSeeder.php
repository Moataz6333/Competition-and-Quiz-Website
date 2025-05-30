<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@laravel.com',
            'password'=>Hash::make('')
        ]);
       User::create([
            'name' => 'Admin2',
            'email' => 'Admin2@laravel.com',
            'password'=>Hash::make('secret2')
        ]);
    }
}

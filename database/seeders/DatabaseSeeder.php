<?php

namespace Database\Seeders;
use App\Models\User;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!User::where("email","mohammed.elabidi123@gmail.com")->exists()){
            User::create([
                'name' => 'mohammed Elabidi',
                'email' => 'mohammed.elabidi123@gmail.com',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
                "email_verified_at" => now(),

            ]);
        }

    }
}

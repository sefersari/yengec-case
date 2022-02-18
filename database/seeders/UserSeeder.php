<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->updateOrCreate(
            [
                "email" => "test@test.com",
            ],
            [
                "name" => "Test User",
                "password" => Hash::make("password"),
                "email_verified_at" => now()
            ]
        );
    }
}

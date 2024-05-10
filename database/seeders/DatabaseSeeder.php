<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        static::initialUsers();
    }

    public static function initialUsers(int $fakeUsers = 0): void
    {
        $initialUsers = [
            [
                'name' => 'Admin User',
                'email' => 'admin@mail.com',
                'password' => Hash::make('power@123'),
            ],
        ];

        foreach ($initialUsers as $userData) {
            User::updateOrCreate([
                'email' => $userData['email'],
            ], $userData);
        }

        if ($fakeUsers > 0) {
            User::factory($fakeUsers)->create();
        }
    }
}

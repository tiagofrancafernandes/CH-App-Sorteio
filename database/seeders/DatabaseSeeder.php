<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Wallet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        static::initialUsers();

        $this->fakeData();
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

    public function fakeData(): void
    {
        if (!app()->environment(['local', 'testing'])) {
            return;
        }

        $this->command?->info('Seeding wallets...');
        User::factory(4)->create()->each(function (User $user) {
            Wallet::factory(rand(1, 3))->create([
                'user_id' => $user?->id,
            ]);
        });
    }
}

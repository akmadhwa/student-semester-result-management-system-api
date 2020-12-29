<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Muhammad Akma Adhwa',
                'email' => 'akma@example.com',
                'email_verified_at' => now(),
                'student_registration_number' => 'WES150014',
                'roles' => 2, // Students
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Ali rajaie',
                'email' => 'Ali@example.com',
                'email_verified_at' => now(),
                'student_registration_number' => 'WES150023',
                'roles' => 2, // Students
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Nor Hidayah',
                'email' => 'Hidayah@example.com',
                'email_verified_at' => now(),
                'student_registration_number' => 'WES150034',
                'roles' => 2, // Students
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'student_registration_number' => '',
                'roles' => 1, // Admin
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => Str::random(10),
                'username' => Str::random(5),
                'password' => Hash::make('password'), // или bcrypt
                'role_id' => Role::ROLE_ADMIN,
            ],
            [
                'id' => 2,
                'name' => Str::random(10),
                'username' => Str::random(5),
                'password' => Hash::make('password'), // или bcrypt
                'role_id' => Role::ROLE_USER,
            ],
        ];

        foreach ($users as $user) {
            User::query()->firstOrCreate(['id' => $user['id']], $user);
        }
    }
}
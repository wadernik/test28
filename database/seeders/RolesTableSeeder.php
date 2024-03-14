<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use Illuminate\Database\Seeder;
use function __;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = [
            ['id' => Role::ROLE_ADMIN, 'name' => __('roles.admin')],
            ['id' => Role::ROLE_USER, 'name' => __('roles.user')],
        ];

        foreach ($roles as $role) {
            Role::query()->firstOrCreate(['id' => $role['id']], $role);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Models\Role\RoleInterface;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = Permission::all();

        /** @var RoleInterface $adminRole */
        $adminRole = Role::query()->find(Role::ROLE_ADMIN);
        $adminRole->permissions()->sync($permissions);

        // ------------------------------------------------ //
        $permissions = Permission::query()
            ->where('name', 'cars.view')
            ->orWhere('name', 'favorites.view')
            ->orWhere('name', 'favorites.edit')
            ->orWhere('name', 'favorites.delete')
            ->get();

        /** @var RoleInterface $basicRole */
        $basicRole = Role::query()->find(Role::ROLE_USER);
        $basicRole->permissions()->sync($permissions);
    }
}
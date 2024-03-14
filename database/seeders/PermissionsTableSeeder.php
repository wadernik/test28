<?php

namespace Database\Seeders;

use App\Models\Permission\Permission;
use Illuminate\Database\Seeder;
use function __;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [
            ['section_id' => 1, 'name' => 'roles.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 1, 'name' => 'roles.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 1, 'name' => 'roles.delete', 'label' => __('permissions.actions.delete')],
            ['section_id' => 2, 'name' => 'users.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 2, 'name' => 'users.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 2, 'name' => 'users.delete', 'label' => __('permissions.actions.delete')],
            ['section_id' => 3, 'name' => 'manufacturers.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 3, 'name' => 'manufacturers.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 3, 'name' => 'manufacturers.delete', 'label' => __('permissions.actions.delete')],
            ['section_id' => 4, 'name' => 'models.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 4, 'name' => 'models.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 4, 'name' => 'models.delete', 'label' => __('permissions.actions.delete')],
            ['section_id' => 5, 'name' => 'cars.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 5, 'name' => 'cars.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 5, 'name' => 'cars.delete', 'label' => __('permissions.actions.delete')],
            ['section_id' => 6, 'name' => 'favorites.view', 'label' => __('permissions.actions.view')],
            ['section_id' => 6, 'name' => 'favorites.edit', 'label' => __('permissions.actions.edit')],
            ['section_id' => 6, 'name' => 'favorites.delete', 'label' => __('permissions.actions.delete')],
        ];

        $id = 1;

        foreach ($items as $item) {
            $item['id'] = $id;

            Permission::query()->updateOrCreate(['id' => $item['id']], $item);

            $id++;
        }
    }
}
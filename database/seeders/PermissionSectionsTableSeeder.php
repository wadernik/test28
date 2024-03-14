<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Permission\PermissionSection;
use Illuminate\Database\Seeder;
use function __;

final class PermissionSectionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['id' => 1, 'name' => __('permission_sections.roles')],
            ['id' => 2, 'name' => __('permission_sections.users')],
            ['id' => 3, 'name' => __('permission_sections.manufacturers')],
            ['id' => 4, 'name' => __('permission_sections.models')],
            ['id' => 5, 'name' => __('permission_sections.cars')],
            ['id' => 6, 'name' => __('permission_sections.favorites')],
        ];

        foreach ($items as $item) {
            PermissionSection::query()->updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
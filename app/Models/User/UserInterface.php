<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Models\Role\RoleInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * @property int    $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property int    $role_id
 *
 * @property RoleInterface $role
 */
interface UserInterface
{
    public function role(): HasOne;

    /**
     * @return Collection<string>
     */
    public function permissions(): Collection;

    public function favorites(): BelongsToMany;
}
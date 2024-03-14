<?php

declare(strict_types=1);

namespace App\Models\Role;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Role extends Model implements RoleInterface
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'label',
    ];

    protected $hidden = [
        'pivot'
    ];

    public const ROLE_ADMIN = 1;
    public const ROLE_USER = 2;

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
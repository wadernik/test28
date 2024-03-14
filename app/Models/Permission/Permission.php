<?php

declare(strict_types=1);

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Permission extends Model implements PermissionInterface
{
    use SoftDeletes;

    public $timestamps = false;

    protected $hidden = ['pivot'];
}
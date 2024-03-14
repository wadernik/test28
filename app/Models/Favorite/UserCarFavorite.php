<?php

declare(strict_types=1);

namespace App\Models\Favorite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class UserCarFavorite extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'car_id',
    ];
}
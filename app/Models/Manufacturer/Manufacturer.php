<?php

declare(strict_types=1);

namespace App\Models\Manufacturer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Manufacturer extends Model implements ManufacturerInterface
{
    use SoftDeletes;

    public $timestamps = false;

    public $table = 'car_manufacturers';

    protected $fillable = [
        'name',
    ];
}
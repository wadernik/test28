<?php

declare(strict_types=1);

namespace App\Models\CarModel;

use App\Models\Manufacturer\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class CarModel extends Model implements CarModelInterface
{
    use SoftDeletes;

    public $timestamps = false;

    public $table = 'car_models';

    protected $fillable = [
        'name',
        'manufacturer_id',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
<?php

declare(strict_types=1);

namespace App\Models\Car;

use App\Models\Manufacturer\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Car extends Model implements CarInterface
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'manufacturer_id',
        'model_id',
        'release_year',
        'mileage',
        'color',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class, 'model_id');
    }
}
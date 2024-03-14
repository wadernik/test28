<?php

declare(strict_types=1);

namespace App\Models\Car;

use App\Models\CarModel\CarModelInterface;
use App\Models\Manufacturer\ManufacturerInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name
 * @property ManufacturerInterface $manufacturer
 * @property CarModelInterface $model
 */
interface CarInterface
{
    public function manufacturer(): BelongsTo;

    public function model(): BelongsTo;
}
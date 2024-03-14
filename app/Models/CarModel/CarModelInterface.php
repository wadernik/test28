<?php

declare(strict_types=1);

namespace App\Models\CarModel;

use App\Models\Manufacturer\ManufacturerInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name
 * @property ManufacturerInterface $manufacturer
 */
interface CarModelInterface
{
    public function manufacturer(): BelongsTo;
}
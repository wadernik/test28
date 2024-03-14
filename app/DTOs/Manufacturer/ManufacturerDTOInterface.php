<?php

declare(strict_types=1);

namespace App\DTOs\Manufacturer;

use App\Interfaces\ImmutableNameInterface;
use Illuminate\Contracts\Support\Arrayable;

interface ManufacturerDTOInterface extends ImmutableNameInterface, Arrayable
{
}
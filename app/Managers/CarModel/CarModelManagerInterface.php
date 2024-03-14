<?php

declare(strict_types=1);

namespace App\Managers\CarModel;

interface CarModelManagerInterface extends CarModelCreatorInterface,
                                           CarModelUpdaterInterface,
                                           CarModelDeleterInterface
{
}
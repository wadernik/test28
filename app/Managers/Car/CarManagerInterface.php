<?php

declare(strict_types=1);

namespace App\Managers\Car;

interface CarManagerInterface extends CarCreatorInterface,
                                      CarUpdaterInterface,
                                      CarDeleterInterface
{
}
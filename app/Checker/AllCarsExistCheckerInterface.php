<?php

declare(strict_types=1);

namespace App\Checker;

interface AllCarsExistCheckerInterface
{
    /**
     * @param array<int> $carIds
     *
     * @return bool
     */
    public function check(array $carIds): bool;
}
<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * @template T of object
 */
interface FindAllInterface
{
    /**
     * @param array       $attributes
     * @param array       $sort
     * @param string|null $limit
     * @param string|null $offset
     *
     * @return Collection<T>
     */
    public function findAll(
        array $attributes = ['*'],
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection;
}
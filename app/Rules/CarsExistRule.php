<?php

namespace App\Rules;

use App\Repositories\Car\FindAllByIdsInterface;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use function __;
use function array_keys;
use function is_numeric;

class CarsExistRule implements ValidationRule
{
    public function __construct(private readonly FindAllByIdsInterface $repository)
    {
    }

    /**
     * @param string  $attribute
     * @param array<array{
     *     id: int
     * }>   $value
     * @param Closure $fail
     *
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $carIds = [];

        foreach ($value as $car) {
            if (!isset($car['id'])) {
                $fail(__('validation.required', ['attribute' => __('attributes.car.id')]));
            }

            $carId = $car['id'];

            if (!is_int($carId)) {
                $fail(__('validation.integer', ['attribute' => __('attributes.car.id')]));
            }

            $carIds[$carId] = true;
        }

        $cars = $this->repository->findAllByIds(array_keys($carIds));

        if ($cars->isEmpty()) {
            $fail(__('car.empty'));
        }

        $cars = $cars->keyBy('id');

        foreach ($carIds as $carId => $bool) {
            if (!$cars->has($carId)) {
                $fail(__('car.does_not_exist', ['attribute' => $carId]));
            }
        }
    }
}
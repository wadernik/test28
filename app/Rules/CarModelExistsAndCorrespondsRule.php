<?php

namespace App\Rules;

use App\Repositories\CarModel\FindOneByIdInterface;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use function __;
use function is_int;

class CarModelExistsAndCorrespondsRule implements ValidationRule, DataAwareRule
{
    public function __construct(private readonly FindOneByIdInterface $repository)
    {
    }

    /**
     * All the data under validation.
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $manufacturerId = $this->data['manufacturer_id'] ?? null;

        if (!$manufacturerId) {
            return;
        }

        if (is_int($value) && $value < 1) {
            $fail(__('validation.integer', ['attribute' => __('attributes.car.model')]));
        }

        $carModel = $this->repository->findOneById($value);

        if ($carModel && $carModel->manufacturer_id === $manufacturerId) {
            return;
        }

        $fail(__('validation.exists', ['attribute' => __('attributes.car.model')]));
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
<?php

namespace App\Http\Requests\Car;

use App\Models\Manufacturer\Manufacturer;
use App\Repositories\CarModel\CarModelRepositoryInterface;
use App\Rules\CarModelExistsAndCorrespondsRule;
use Illuminate\Foundation\Http\FormRequest;
use function __;

class CreateCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(CarModelRepositoryInterface $repository): array
    {
        return [
            'manufacturer_id' => 'required|integer|min:1|exists:' . Manufacturer::class . ',id',
            'model_id' => [
                'required',
                'integer',
                new CarModelExistsAndCorrespondsRule($repository)
            ],
            'release_year' => 'sometimes|date_format:Y|nullable',
            'mileage' => 'sometimes|integer|min:0|nullable',
            'color' => 'sometimes|string|max:64|nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'manufacturer_id' => __('attributes.car.manufacturer'),
            'model_id' => __('attributes.car.model'),
            'release_year' => __('attributes.car.release_year'),
            'mileage' => __('attributes.car.mileage'),
            'color' => __('attributes.car.color'),
        ];
    }
}
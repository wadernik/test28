<?php

namespace App\Http\Requests\CarModel;

use App\Models\Manufacturer\Manufacturer;
use Illuminate\Foundation\Http\FormRequest;
use function __;

class CreateCarModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'manufacturer_id' => 'required|integer|min:1|exists:' . Manufacturer::class . ',id',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attributes.car_model.name'),
            'manufacturer_id' => __('attributes.car_model.manufacturer'),
        ];
    }
}
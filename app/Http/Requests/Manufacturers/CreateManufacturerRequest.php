<?php

namespace App\Http\Requests\Manufacturers;

use Illuminate\Foundation\Http\FormRequest;

class CreateManufacturerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attributes.manufacturer.name'),
        ];
    }
}
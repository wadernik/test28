<?php

declare(strict_types=1);

namespace App\Http\Requests\Car;

final class UpdateCarRequest extends CreateCarRequest
{
    public function rules(): array
    {
        return [
            'manufacturer_id' => 'sometimes|integer|min:1',
            'model_id' => 'sometimes|integer|min:1',
            'release_year' => 'sometimes|date_format:Y|nullable',
            'mileage' => 'sometimes|integer|min:1|nullable',
            'color' => 'sometimes|string|max:64|nullable',
        ];
    }
}
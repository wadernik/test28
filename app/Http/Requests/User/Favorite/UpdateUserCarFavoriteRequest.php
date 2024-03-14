<?php

namespace App\Http\Requests\User\Favorite;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserCarFavoriteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cars' => 'required|array',
            'cars.*.id' => 'required|int|min:1',
        ];
    }
}
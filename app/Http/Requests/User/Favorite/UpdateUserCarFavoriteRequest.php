<?php

namespace App\Http\Requests\User\Favorite;

use App\Repositories\Car\CarRepositoryInterface;
use App\Rules\CarsExistRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserCarFavoriteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(CarRepositoryInterface $repository): array
    {
        return [
            'cars' => ['required', 'array', new CarsExistRule($repository)],
        ];
    }
}
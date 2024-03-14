<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Car\CreateCarController;
use App\Http\Controllers\Api\Car\DeleteCarController;
use App\Http\Controllers\Api\Car\GetCarController;
use App\Http\Controllers\Api\Car\ListCarController;
use App\Http\Controllers\Api\Car\UpdateCarController;
use App\Http\Controllers\Api\CarModel\CreateCarModelController;
use App\Http\Controllers\Api\CarModel\DeleteCarModelController;
use App\Http\Controllers\Api\CarModel\GetCarModelController;
use App\Http\Controllers\Api\CarModel\ListCarModelController;
use App\Http\Controllers\Api\CarModel\UpdateCarModelController;
use App\Http\Controllers\Api\Manufacturer\CreateManufacturerController;
use App\Http\Controllers\Api\Manufacturer\DeleteManufacturerController;
use App\Http\Controllers\Api\Manufacturer\GetManufacturerController;
use App\Http\Controllers\Api\Manufacturer\ListManufacturerController;
use App\Http\Controllers\Api\Manufacturer\UpdateManufacturerController;
use App\Http\Controllers\Api\User\ListUserCarFavoritesController;
use App\Http\Controllers\Api\User\ManageUserCarFavoritesController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', AuthController::class);

Route::middleware('auth:sanctum')->group(static function () {
    Route::prefix('manufacturers')->group(static function () {
        Route::middleware('sanctum.permissions:manufacturers.view')->get('{id}', GetManufacturerController::class);
        Route::middleware('sanctum.permissions:manufacturers.view')->get('', ListManufacturerController::class);
        Route::middleware('sanctum.permissions:manufacturers.edit')->post('', CreateManufacturerController::class);
        Route::middleware('sanctum.permissions:manufacturers.edit')->put('{id}', UpdateManufacturerController::class);
        Route::middleware('sanctum.permissions:manufacturers.delete')->delete('{id}', DeleteManufacturerController::class);
    });

    Route::prefix('models')->group(static function () {
        Route::middleware('sanctum.permissions:models.view')->get('{id}', GetCarModelController::class);
        Route::middleware('sanctum.permissions:models.view')->get('', ListCarModelController::class);
        Route::middleware('sanctum.permissions:models.edit')->post('', CreateCarModelController::class);
        Route::middleware('sanctum.permissions:models.edit')->put('{id}', UpdateCarModelController::class);
        Route::middleware('sanctum.permissions:models.delete')->delete('{id}', DeleteCarModelController::class);
    });

    Route::prefix('cars')->group(static function () {
        Route::middleware('sanctum.permissions:cars.view')->get('{id}', GetCarController::class);
        Route::middleware('sanctum.permissions:cars.view')->get('', ListCarController::class);
        Route::middleware('sanctum.permissions:cars.edit')->post('', CreateCarController::class);
        Route::middleware('sanctum.permissions:cars.edit')->put('{id}', UpdateCarController::class);
        Route::middleware('sanctum.permissions:cars.delete')->delete('{id}', DeleteCarController::class);
    });

    Route::prefix('users/favorites')->group(static function () {
        Route::middleware('sanctum.permissions:favorites.view')->get(
            'v1',
            [ListUserCarFavoritesController::class, 'listAll']
        );
        Route::middleware('sanctum.permissions:favorites.view')->get(
            'v2',
            [ListUserCarFavoritesController::class, 'list']
        );
        Route::middleware('sanctum.permissions:favorites.edit')->post('', ManageUserCarFavoritesController::class);
    });
});
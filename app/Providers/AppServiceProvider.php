<?php

namespace App\Providers;

use App\Managers\Car\CarManager;
use App\Managers\Car\CarManagerInterface;
use App\Managers\CarModel\CarModelManager;
use App\Managers\CarModel\CarModelManagerInterface;
use App\Managers\Manufacturer\ManufacturerManager;
use App\Managers\Manufacturer\ManufacturerManagerInterface;
use App\Repositories\Car\CarRepository;
use App\Repositories\Car\CarRepositoryInterface;
use App\Repositories\CarModel\CarModelRepository;
use App\Repositories\CarModel\CarModelRepositoryInterface;
use App\Repositories\Manufacturer\ManufacturerRepository;
use App\Repositories\Manufacturer\ManufacturerRepositoryInterface;
use App\Repositories\UserCarFavorite\UserCarFavoriteRepository;
use App\Repositories\UserCarFavorite\UserCarFavoriteRepositoryInterface;
use App\Service\Auth\AuthService;
use App\Service\Auth\AuthServiceInterface;
use App\Service\User\Favorite\UserCarFavoriteUpdaterService;
use App\Service\User\Favorite\UserCarFavoriteUpdaterServiceInterface;
use App\Service\User\Favorite\UserFavoriteCarsRetriever;
use App\Service\User\Favorite\UserFavoriteCarsRetrieverInterface;
use Illuminate\Support\ServiceProvider;
use function app;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * MANAGERS
         */
        $this->app->bind(ManufacturerManagerInterface::class, ManufacturerManager::class);

        $this->app->bind(CarModelManagerInterface::class, CarModelManager::class);

        $this->app->bind(CarManagerInterface::class, CarManager::class);

        /**
         * REPOSITORIES
         */
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerRepository::class);

        $this->app->bind(CarModelRepositoryInterface::class, CarModelRepository::class);

        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);

        $this->app->bind(UserCarFavoriteRepositoryInterface::class, UserCarFavoriteRepository::class);

        /**
         * SERVICES
         */
        $this->app->bind(UserCarFavoriteUpdaterServiceInterface::class, UserCarFavoriteUpdaterService::class);

        $this->app->bind(UserFavoriteCarsRetrieverInterface::class, function (): UserFavoriteCarsRetriever {
            return new UserFavoriteCarsRetriever(
                app()->make(UserCarFavoriteRepositoryInterface::class),
                app()->make(CarRepositoryInterface::class)
            );
        });

        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
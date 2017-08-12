<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         *
         *  Location service provider
         */

        $this->app->bind('App\IRepository\LocationRepositoryInterface',
                        'App\Repository\LocationRepository');

        $this->app->bind('App\IService\LocationServiceInterface',
                            'App\Service\LocationService');

        /**
         *
         *  Position service provider
         */

        $this->app->bind('App\IRepository\PositionRepositoryInterface',
                            'App\Repository\PositionRepository');

        $this->app->bind('App\IService\PositionServiceInterface',
                            'App\Service\PositionService');

        /**
         *
         *  Stage service provider
         */

        $this->app->bind('App\IRepository\StageRepositoryInterface',
                                 'App\Repository\StageRepository');

        $this->app->bind('App\IService\StageServiceInterface',
                                'App\Service\StageService');
    }
}

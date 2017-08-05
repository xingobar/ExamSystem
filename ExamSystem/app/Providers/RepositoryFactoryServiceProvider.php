<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class RepositoryFactoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        App::bind('repositoryFactory',function(){
//            return new App\RepositoryFactory\RepositoryFactoryFacade;
//        });
        $this->app->bind('factory',function($app){
            return new App\RepositoryFactory\RepositoryFactoryFacade;
        });
    }
}

<?php

namespace Application\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\User\Providers\RouteServiceProvider as UserRouteServiceProvider;
use Domain\User\Providers\RepositoryServiceProvider;
use Domain\User\Providers\DataFactoryProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(UserRouteServiceProvider::class);
        $this->app->register(DataFactoryProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

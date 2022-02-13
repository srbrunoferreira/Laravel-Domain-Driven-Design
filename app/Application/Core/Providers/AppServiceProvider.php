<?php

namespace Application\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\User\Providers\RouteServiceProvider as UserRouteServiceProvider;
use Domain\User\Providers\RepositoryServiceProvider;

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

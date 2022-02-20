<?php

namespace Domain\User\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\User\DataTransferObjects\Factories\UserDataFactory;
use Domain\User\Contracts\UserDataFactoryInterface;

class DataFactoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserDataFactoryInterface::class, UserDataFactory::class);
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

<?php

namespace Domain\User\Providers;

use Infrastructure\Contracts\EloquentRepositoryInterface;
use Infrastructure\Abstracts\EloquentRepository;
use Illuminate\Support\ServiceProvider;
use Domain\User\Repositories\UserRepository;
use Domain\User\Entities\User;
use Domain\User\Contracts\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, EloquentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserRepository(new User());
        });
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

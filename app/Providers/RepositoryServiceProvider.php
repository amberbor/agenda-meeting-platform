<?php

namespace App\Providers;

use App\Repository\Classes\EventRepository;
use App\Repository\Classes\RoleRepository;
use App\Repository\Classes\UserRepository;
use App\Repository\Contracts\IEventRepository;
use App\Repository\Contracts\IRoleRepository;
use App\Repository\Contracts\IUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            IEventRepository::class,
            EventRepository::class
        );

        $this->app->bind(
            IRoleRepository::class,
            RoleRepository::class
        );

        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
    }
}

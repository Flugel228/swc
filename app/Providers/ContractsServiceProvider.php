<?php

namespace App\Providers;

use App\Contracts\Repositories\EventRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\EventServiceContract;
use App\Contracts\Services\UserServiceContract;
use App\Repositories\EventRepository;
use App\Repositories\UserRepository;
use App\Services\EventService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceContract::class, UserService::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(EventServiceContract::class, EventService::class);
        $this->app->bind(EventRepositoryContract::class, EventRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

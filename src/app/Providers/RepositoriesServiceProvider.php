<?php

namespace App\Providers;

use App\Repositories\Contracts\ChannelRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentChannelRepository;
use App\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public $bindings = [
        UserRepositoryInterface::class    => EloquentUserRepository::class,
        ChannelRepositoryInterface::class => EloquentChannelRepository::class,
    ];

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
        //
    }
}

<?php

namespace App\Providers;

use App\Contracts\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindIf('users', UserRepository::class, true);
        $this->app->alias('users', UserInterface::class);
    }
}

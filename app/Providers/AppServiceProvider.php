<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public $serviceBindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface'=>'App\Repositories\UserRepository',
        'App\Repositories\Interfaces\ProvinceRepositoryInterface'=>'App\Repositories\ProvinceRepository',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->serviceBindings as $key => $value) {
            $this->app->bind($key, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Schema::defaultStringLength(192);
    }
}

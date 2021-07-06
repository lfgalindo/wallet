<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Users\Contracts\UserService as UserServiceContract;
use App\Services\Users\UserService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserServiceContract::class, UserService::class);
    }
}

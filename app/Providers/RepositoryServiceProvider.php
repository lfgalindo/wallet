<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    UserRepository as UserRepositoryContract,
    WalletRepository as WalletRepositoryContract,
};
use App\Repositories\Eloquent\{
    UserRepository,
    WalletRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(WalletRepositoryContract::class, WalletRepository::class);
    }
}

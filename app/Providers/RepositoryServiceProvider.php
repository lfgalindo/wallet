<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    TransactionRepository as TransactionRepositoryContract,
    UserRepository as UserRepositoryContract,
    WalletRepository as WalletRepositoryContract,
};
use App\Repositories\Eloquent\{
    TransactionRepository,
    UserRepository,
    WalletRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TransactionRepositoryContract::class, TransactionRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(WalletRepositoryContract::class, WalletRepository::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contracts\{
    Transaction as TransactionContract,
    User as UserContract,
    Wallet as WalletContract
};
use App\Models\{
    Transaction,
    User,
    Wallet
};

class ModelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TransactionContract::class, Transaction::class);
        $this->app->bind(UserContract::class, User::class);
        $this->app->bind(WalletContract::class, Wallet::class);
    }
}

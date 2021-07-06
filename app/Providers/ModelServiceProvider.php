<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contracts\{
    User as UserContract
};
use App\Models\{
    User
};

class ModelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserContract::class, User::class);
    }
}

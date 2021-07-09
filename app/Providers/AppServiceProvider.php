<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\User\Contracts\UserService as UserServiceContract;
use App\Services\User\UserService;

use App\Services\Transaction\Contracts\TransactionService as TransactionServiceContract;
use App\Services\Transaction\TransactionService;

use App\Services\Authorization\Contracts\AuthorizationService as AuthorizationServiceContract;
use App\Services\Authorization\AuthorizationService;

use App\Services\HttpClient\Contracts\HttpClientService;
use App\Services\HttpClient\HttpClientLaravelService;

use App\Services\Notification\Contracts\NotificationService;
use App\Services\Notification\NotificationQueueService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserServiceContract::class, UserService::class);
        $this->app->bind(TransactionServiceContract::class, TransactionService::class);
        $this->app->bind(AuthorizationServiceContract::class, AuthorizationService::class);
        $this->app->bind(HttpClientService::class, HttpClientLaravelService::class);
        $this->app->bind(NotificationService::class, NotificationQueueService::class);
    }
}

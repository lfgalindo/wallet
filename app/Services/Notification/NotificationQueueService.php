<?php

namespace App\Services\Notification;

use App\Jobs\SendNotification;
use App\Services\Notification\Contracts\NotificationService;

class NotificationQueueService implements NotificationService
{
    public function send(): void
    {
        SendNotification::dispatch();
    }
}

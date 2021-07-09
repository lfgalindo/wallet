<?php

namespace App\Services\Notification\Contracts;

interface NotificationService
{
    public function send(): void;
}

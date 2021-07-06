<?php

namespace App\Models\Contracts;

interface User
{
    public function canSendMoney(): bool;
}
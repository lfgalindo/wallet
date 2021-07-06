<?php

namespace App\Repositories\Contracts;

interface WalletRepository 
{
    public function create(int $userId);
}

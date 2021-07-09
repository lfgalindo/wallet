<?php

namespace App\Repositories\Contracts;

use App\Models\Wallet;

interface WalletRepository 
{
    public function chargeIfHasSufficientBalance(Wallet $wallet, float $value): bool;
    public function addCredit(Wallet $wallet, float $value);
    public function create(int $userId): Wallet;
}

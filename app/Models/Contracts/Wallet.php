<?php

namespace App\Models\Contracts;

interface Wallet
{
    public function hasSufficientBalance(float $value): bool;
}
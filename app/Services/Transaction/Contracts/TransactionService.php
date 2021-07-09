<?php

namespace App\Services\Transaction\Contracts;

interface TransactionService 
{
    public function validateTransaction(array $dataTransaction): array;
}

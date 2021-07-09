<?php

namespace App\Repositories\Contracts;

use App\Models\Contracts\Transaction;

interface TransactionRepository 
{
    public function begin(int $payerId, int $payeeId, float $value): Transaction;
    public function endWithSuccess(Transaction $transaction): Transaction;
    public function endWithError(Transaction $transaction): Transaction;
}

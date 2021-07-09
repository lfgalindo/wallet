<?php

namespace App\Repositories\Eloquent;

use App\Models\Contracts\Transaction;
use App\Repositories\Contracts\TransactionRepository as TransactionRepositoryContract;

class TransactionRepository implements TransactionRepositoryContract
{
    private $transactionModel;

    public function __construct (Transaction $transactionModel)
    {
        $this->transactionModel = $transactionModel;
    }

    public function begin(int $payerId, int $payeeId, float $value): Transaction
    {
        $this->transactionModel->payer_id = $payerId;
        $this->transactionModel->payee_id = $payeeId;
        $this->transactionModel->value = $value;
        $this->transactionModel->save();

        return $this->transactionModel;
    }

    
    public function endWithSuccess(Transaction $transaction): Transaction
    {
        $transaction->setSuccess();
        $transaction->save();
        
        return $transaction;
    }

    public function endWithError(Transaction $transaction): Transaction
    {
        $transaction->setError();
        $transaction->save();
        
        return $transaction;
    }
}
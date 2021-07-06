<?php

namespace App\Repositories\Eloquent;

use App\Models\Wallet;
use App\Repositories\Contracts\WalletRepository as WalletRepositoryContract;

class WalletRepository implements WalletRepositoryContract
{
    private $walletModel;

    public function __construct (Wallet $walletModel)
    {
        $this->walletModel = $walletModel;
    }

    public function create(int $userId)
    {
        $this->walletModel->user_id = $userId;
        $this->walletModel->balance = 0;
        $this->walletModel->save();

        return $this->walletModel;
    }
}
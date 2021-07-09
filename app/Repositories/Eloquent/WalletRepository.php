<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Repositories\Contracts\WalletRepository as WalletRepositoryContract;

class WalletRepository implements WalletRepositoryContract
{
    private $walletModel;

    public function __construct (Wallet $walletModel)
    {
        $this->walletModel = $walletModel;
    }

    public function chargeIfHasSufficientBalance(Wallet $wallet, float $value): bool
    {
        $affectedRows = Wallet::where('id', '=', $wallet->id)
                            ->where('balance', '>=', $value)
                            ->update([
                                'balance' => DB::raw("balance - ${value}")
                            ]);

        return $affectedRows !== 0;
    }

    public function addCredit(Wallet $wallet, float $value)
    {
        return Wallet::where('id', '=', $wallet->id)
                    ->update([
                        'balance' => DB::raw("balance + ${value}")
                    ]);
    }

    public function create(int $userId): Wallet
    {
        $this->walletModel->user_id = $userId;
        $this->walletModel->balance = 100;
        $this->walletModel->save();

        return $this->walletModel;
    }
}

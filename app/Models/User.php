<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Models\Contracts\User as UserContract;

class User extends Model implements UserContract
{
    use HasFactory, SoftDeletes;

    public function canSendMoney(): bool
    {
        return !$this->isShopkeeper();
    }

    private function isShopkeeper(): bool
    {
        return !is_null($this->cpf_cnpj) && strlen($this->cpf_cnpj) > 11;
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet');
    }

    public function sentMoney()
    {
        return $this->hasMany('App\Models\Transaction', 'payer_id');
    }

    public function receivedMoney()
    {
        return $this->hasMany('App\Models\Transaction', 'payee_id');
    }
}

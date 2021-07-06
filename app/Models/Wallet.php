<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Models\Contracts\Wallet as WalletContract;

class Wallet extends Model implements WalletContract
{
    use HasFactory, SoftDeletes;
    
    public function hasSufficientBalance(float $value): bool
    {
        return $this->balance >= $value;
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

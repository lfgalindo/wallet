<?php

namespace App\Models;

use App\Models\Contracts\Transaction as TransactionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements TransactionContract
{
    use HasFactory;

    protected $attributes = [
        'status' => 'PROCESSING'
    ];

    public function setError(): void
    {
        $this->status = 'ERROR';
    }

    public function setSuccess(): void
    {
        $this->status = 'SUCCESS';
    }
    
    public function payer()
    {
        return $this->belongsTo('App\Models\User', 'payer_id');
    }

    public function payee()
    {
        return $this->hasMany('App\Models\User', 'payee_id');
    }
}

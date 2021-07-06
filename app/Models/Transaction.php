<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    public function payer()
    {
        return $this->belongsTo('App\Models\User', 'payer_id');
    }

    public function payee()
    {
        return $this->hasMany('App\Models\User', 'payee_id');
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'value' => 'required|numeric',
            'payer' => 'required|exists:users,id',
            'payee' => 'required|exists:users,id|different:payer',
        ];
    }
}

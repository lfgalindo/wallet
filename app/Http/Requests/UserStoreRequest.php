<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'cpf' => ['required_without:cnpj', 'cpf', 'unique:users,cpf_cnpj'],
            'cnpj' => ['required_without:cpf', 'cnpj', 'unique:users,cpf_cnpj'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ];
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\Contracts\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserRepository as UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    private $userModel;

    public function __construct (User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUserByIdWithWallet(int $userId): User
    {
        return $this->userModel->with('wallet')->findOrFail($userId);
    }

    public function create(array $dataUser): User
    {
        $this->userModel->name = $dataUser['name'];
        $this->userModel->cpf_cnpj = $dataUser['cpf_cnpj'];
        $this->userModel->email = $dataUser['email'];
        $this->userModel->password = Hash::make($dataUser['password']);
        $this->userModel->save();

        return $this->userModel;
    }
}
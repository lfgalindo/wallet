<?php

namespace App\Services\Users;

use App\Services\Users\Contracts\UserService as UserServiceContract;
use App\Repositories\Contracts\{UserRepository, WalletRepository};

class UserService implements UserServiceContract 
{
    private $userRepository;
    private $walletRepository;

    public function __construct (
        UserRepository $userRepository,
        WalletRepository $walletRepository
    ) {
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    public function createUser(array $dataUser)
    {
        $dataUser['cpf_cnpj'] = isset($dataUser['cpf']) ? $dataUser['cpf'] : $dataUser['cnpj'];

        $user = $this->userRepository->create($dataUser);
        $user->wallet = $this->walletRepository->create($user->id);

        return $user;
    }
}

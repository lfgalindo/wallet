<?php

namespace App\Repositories\Contracts;

use App\Models\Contracts\User;

interface UserRepository 
{ 
    public function getUserByIdWithWallet(int $userId): User;
    public function create(array $dataUser): User;
}

<?php

namespace App\Services\User\Contracts;

use App\Models\Contracts\User;

interface UserService 
{
    public function createUser(array $dataUser): User;
}

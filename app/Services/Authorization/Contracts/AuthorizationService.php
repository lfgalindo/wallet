<?php

namespace App\Services\Authorization\Contracts;

interface AuthorizationService
{
    public function authorizeTransaction(): bool;
}

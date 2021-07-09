<?php

namespace App\Models\Contracts;

interface Transaction
{
    public function setError(): void;
    public function setSuccess(): void;
}

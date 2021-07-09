<?php

namespace App\Services\HttpClient\Contracts;

interface HttpClientService
{
    public function get(string $url): array;
}

<?php

namespace App\Services\Authorization;

use App\Services\HttpClient\Contracts\HttpClientService;
use App\Services\Authorization\Contracts\AuthorizationService as AuthorizationServiceContract;

class AuthorizationService implements AuthorizationServiceContract
{
    private $urlAuthorization = 'https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6';
    private $httpClientService;

    public function __construct(HttpClientService $httpClientService)
    {
        $this->httpClientService = $httpClientService;
    }

    public function authorizeTransaction(): bool
    {
        $response = $this->httpClientService->get($this->urlAuthorization);

        return $response['status'] == 200 && 
                is_array($response['body']) && 
                isset($response['body']['message']) && 
                $response['body']['message'] == 'Autorizado';
    }
}

<?php

namespace App\Services\HttpClient;

use Illuminate\Support\Facades\Http;
use App\Services\HttpClient\Contracts\HttpClientService;

class HttpClientLaravelService implements HttpClientService
{
    public function get(string $url): array
    {
        $response = Http::get($url);
        
        return [
            'body' => $response->json(),
            'headers' => $response->headers(),
            'status' => $response->status(),
        ];
    }
}

<?php

namespace Tests\Unit\Services\Authorization;

use App\Services\Authorization\AuthorizationService;
use App\Services\HttpClient\HttpClientLaravelService;
use PHPUnit\Framework\TestCase;

class AuthorizationServiceTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnTrueOnAuthorizationSuccess()
    {
        $stubHttp = $this->createMock(HttpClientLaravelService::class);
        $stubHttp->method('get')
                    ->willReturn([
                        'status' => 200,
                        'body' => [
                            'message' => 'Autorizado'
                        ]
                    ]);

        $authorizationService = new AuthorizationService($stubHttp);

        $this->assertTrue($authorizationService->authorizeTransaction());
    }

    /**
     * @test
     */
    public function shouldReturnFalseOnAuthorizationError()
    {
        $stubHttp = $this->createMock(HttpClientLaravelService::class);
        $stubHttp->method('get')
            ->willReturn([
                'status' => 500,
                'body' => [
                    'message' => 'Não autorizado'
                ]
            ]);

        $authorizationService = new AuthorizationService($stubHttp);

        $this->assertFalse($authorizationService->authorizeTransaction());
    }
}

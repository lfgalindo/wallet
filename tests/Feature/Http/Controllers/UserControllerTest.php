<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider provideDataStoreUser
     */
    public function storeUser($data, $status)
    {
        $response = $this->postJson('/api/user', $data);
        $response->assertStatus($status);
    }

    public function provideDataStoreUser()
    {
        return [
            'shouldReturnValidationError' => [[], 422],
            'shouldReturnOk' => [
                [
                    'name' => 'Teste de nome',
                    'cpf' => '11680101013',
                    'email' => 'teste@teste.com',
                    'password' => 'senha'
                ],
                201
            ]
        ];
    }
}

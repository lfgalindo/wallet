<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{User, Wallet};

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldReturnValidationError()
    {
        $response = $this->postJson('/api/transaction', []);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function shouldReturnErrorWhenPayeerIsShopkeeper()
    {
        $user = User::factory()->create();
        $shopkeeper = User::factory()->cnpj()->create();

        $response = $this->postJson('/api/transaction', [
            'payer' => $shopkeeper->id,
            'payee' => $user->id,
            'value' => 100
        ]);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function shouldReturnErrorWhenPayeerNotHasSufficientBalance()
    {
        $payer = User::factory()->has(Wallet::factory())->create();
        $payee = User::factory()->has(Wallet::factory())->create();

        $response = $this->postJson('/api/transaction', [
            'payer' => $payer->id,
            'payee' => $payee->id,
            'value' => 100.01
        ]);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function shouldReturnOk()
    {
        $user = User::factory()->has(Wallet::factory())->create();
        $shopkeeper = User::factory()->cnpj()->has(Wallet::factory())->create();

        $response = $this->postJson('/api/transaction', [
            'payer' => $user->id,
            'payee' => $shopkeeper->id,
            'value' => 100.00
        ]);

        $response->assertStatus(201);
    }
}

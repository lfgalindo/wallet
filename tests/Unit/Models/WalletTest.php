<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Wallet;

class WalletTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideBalances
     */
    public function hasSufficientBalance($has, $need, $shouldBe)
    {
        $wallet = new Wallet();
        $wallet->balance = $has;

        $this->assertEquals($wallet->hasSufficientBalance($need), $shouldBe);
    }
    
    public function provideBalances()
    {
        return [
            'shouldBeTrueWhenBalanceGreaterThanNeed' => [1000.58, 700, true],
            'shouldBeTrueWhenBalanceEqualToNeed' => [326.20, 326.20, true],
            'shouldBeFalseWhenBalanceLessThanNeed' => [17, 17.3, false]
        ];
    }
}

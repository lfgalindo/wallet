<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideCpfsAndCnpjs
     */
    public function canSendMoney($cpfCnpj, $canSend)
    {
        $user = new User();
        $user->cpf_cnpj = $cpfCnpj;

        $this->assertEquals($user->canSendMoney(), $canSend);
    }

    public function provideCpfsAndCnpjs()
    {
        return [
            'shouldBeTrueWhenCpf' => [61090813023, true],
            'shouldBeFalseWhenCnpj' => [14695667000160, false],
        ];
    }
}

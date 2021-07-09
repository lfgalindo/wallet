<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cpf_cnpj' => $this->faker->unique()->numberBetween(12345678912, 98765432121),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
    }

    public function cnpj()
    {
        return $this->state(function (array $attributes) {
            return [
                'cpf_cnpj' => $this->faker->unique()->numberBetween(12345678912345, 98765432121789),
            ];
        });
    }
}

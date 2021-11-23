<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FinanceiroPagarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => rand(1, 250),
            'usuario_id' => rand(1, 250),
            'boleto_id' => null,
            'descricao' => $this->faker->paragraph(3),
            'valor' => $this->faker->randomFloat(2, 100, 1000),
            'emissao' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'vencimento' => $this->faker->dateTimeBetween('now', '+6 months'),
            'recorrente' => 0,
            'periodo' => 0,
            'status' => false
        ];
    }
}

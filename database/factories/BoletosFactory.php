<?php

namespace Database\Factories;

use App\Models\Boletos;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoletosFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Boletos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => rand(1, 100),
            'financeiro_receber_id' => rand(1, 1500),
            'seu_numero' => '00757462181',
            'codigo_barras' => '0779' . $this->faker->numerify('########################################'),
            'linha_digitavel' => '0779' . $this->faker->numerify('###########################################'),
            'boleto_arquivo' => 'boleto-inter-ArQTnY.pdf',
            'nosso_numero' => '0075' . $this->faker->randomNumber(7, true),
            'emissao' => $this->faker->dateTimeBetween('now'),
            'vencimento' => $this->faker->dateTimeBetween('now', '+2 months'),
            'pago' => 0
        ];
    }
}

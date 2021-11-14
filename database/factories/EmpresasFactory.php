<?php

namespace Database\Factories;

use App\Models\Empresas;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    public function definition()
    {
        return [
            'fantasia' => '',
            'razao' => '',
            'cnpj' => '',
            'rua' => '',
            'numero' => '',
            'complemento' => '',
            'cep' => '',
            'bairro' => '',
            'cidade' => '',
            'estado' => '',
            'telefonePrincipal' => '',
            'telefoneSecundario' => '',
        ];
    }
}

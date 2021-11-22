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

    public function definition()
    {
        return [
            'razao' => $this->faker->company(),
            'fantasia' => $this->faker->company(),
            'cnpj' => $this->faker->ean13() . 0,
            'atividade' => $this->faker->jobTitle(),
            'rua' => $this->faker->streetAddress(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->text(100),
            'cep' => $this->faker->postcode(),
            'bairro' => $this->getBairro(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'telefonePrincipal' => $this->faker->isbn10(),
            'telefoneSecundario' => $this->faker->isbn10(),
            'inscricaoMunicipal' => rand(100000, 999999),
            'inscricaoEstadual' => rand(100000, 999999),
            'cnae' => rand(1000000, 9999999),
        ];
    }

    private function getBairro()
    {
        $bairros = ["Albardão", "Alto Aririu", "Área Rural de Palhoça", "Aririu", "Aririu da Formiga", "Aririu Formiga", "Balneário Ponta Papagaio - Enseada Brito", "Barra Aririu", "Barra do Aririu", "Bela Vista", "Brejaru", "Caminho Novo", "Centro", "Cidade Universitária Pedra Branca", "Enseada Brito- Enseada Brito", "Enseada do Brito", "Enseada do Brito Enseada Brito", "Guarda do Cubatão", "Guarda do Embau", "Guarda do Embau Enseada Brito", "Guarda Embau", "Guarda Embau - Enseada Brito", "Jardim Aquarius", "Jardim Carioca", "Jardim Coqueiros", "Jardim das Palmeiras", "Jardim Eldorado", "Maciambu - Enseada Brito", "Nova Palhoça", "Pacheco", "Pachecos", "Pagani", "Passa Vinte", "Passagem de Maciambu", "Passagem Maciambu Enseada Brito", "Pedra Branca", "Pinheira", "Pinheira - Enseada Brito", "Pinheira Enseada Brito", "Pintora Papagaio", "Ponte do Imaruim", "Ponte Imaruim", "Praia de Fora", "Praia do Meio Enseada Brito", "Praia do Sonho Enseada Brito", "Praia Fora", "Praia Meio - Enseada Brito", "Praia Pinheira", "Praia Sonho", "Praia Sonho - Enseada Brito", "Rio Grande", "São Sebastião", "Terra Fraca"];

        $getBairro = (array_rand($bairros, 1));

        return $bairros[$getBairro];
    }
}

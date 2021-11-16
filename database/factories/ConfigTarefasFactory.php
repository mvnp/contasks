<?php

namespace Database\Factories;

use App\Models\ConfigTarefas;
use App\Models\ConfigAtividades;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigTarefasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigTarefas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->jobTitle(),
            'descricao' => $this->faker->paragraph(3, false),
            'atividade_id' => ConfigAtividades::factory()
        ];
    }
}

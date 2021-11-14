<?php

namespace Database\Factories;

use App\Models\ConfigAtividades;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigAtividadesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigAtividades::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->jobTitle()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ConfigSetores;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigSetoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigSetores::class;

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

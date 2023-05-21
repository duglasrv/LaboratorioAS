<?php

namespace Database\Factories;

use App\Models\visitante;
use Illuminate\Database\Eloquent\Factories\Factory;

class visitanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = visitante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dpi' => $this->faker->word,
        'nombre' => $this->faker->word,
        'fecha' => $this->faker->word
        ];
    }
}

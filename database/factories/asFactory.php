<?php

namespace Database\Factories;

use App\Models\as;
use Illuminate\Database\Eloquent\Factories\Factory;

class asFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = as::class;

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

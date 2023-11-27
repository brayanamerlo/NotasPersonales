<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IanRodrigo\Faker\Provider\Lorem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => fake()->numberBetween(1, 3),
            'categoria_id' => fake()->numberBetween(1, 20),
            'titulo' => fake() -> word,
            'contenido' => fake() -> sentence,
            'fecha_creacion' => fake() ->date,
        ];
    }
}

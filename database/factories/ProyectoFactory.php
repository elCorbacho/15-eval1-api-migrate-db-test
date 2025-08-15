<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(10, true),
            'fecha_inicio' => $this->faker->date('Y-m-d'),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'responsable' => $this->faker->name(),
            'monto' => $this->faker->numberBetween(3000, 2500000),
        ];
    }
}

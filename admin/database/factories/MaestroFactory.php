<?php

namespace Database\Factories;

use App\Models\Maestro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaestroFactory extends Factory
{
    protected $model = Maestro::class;

    public function definition()
    {
        return [
			'usuario' => $this->faker->name,
			'correo' => $this->faker->name,
			'img' => $this->faker->name,
			'nombre' => $this->faker->name,
			'discapacidad' => $this->faker->name,
        ];
    }
}

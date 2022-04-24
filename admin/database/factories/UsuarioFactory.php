<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
			'usuario' => $this->faker->name,
			'correo' => $this->faker->name,
			'img' => $this->faker->name,
			'num_control' => $this->faker->name,
			'nombre' => $this->faker->name,
			'discapacidad' => $this->faker->name,
        ];
    }
}

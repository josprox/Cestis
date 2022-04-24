<?php

namespace Database\Factories;

use App\Models\Argalumno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArgalumnoFactory extends Factory
{
    protected $model = Argalumno::class;

    public function definition()
    {
        return [
			'id_gg' => $this->faker->name,
			'id_esp' => $this->faker->name,
			'id_alm' => $this->faker->name,
			'id_turn' => $this->faker->name,
			'id_sexo' => $this->faker->name,
        ];
    }
}

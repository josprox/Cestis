<?php

namespace Database\Factories;

use App\Models\Argmaestro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArgmaestroFactory extends Factory
{
    protected $model = Argmaestro::class;

    public function definition()
    {
        return [
			'id_gg' => $this->faker->name,
			'id_esp' => $this->faker->name,
			'id_mst' => $this->faker->name,
			'id_turno' => $this->faker->name,
			'id_sexo' => $this->faker->name,
        ];
    }
}

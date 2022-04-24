<?php

namespace Database\Factories;

use App\Models\Descarga;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DescargaFactory extends Factory
{
    protected $model = Descarga::class;

    public function definition()
    {
        return [
			'id_gg' => $this->faker->name,
			'id_esp' => $this->faker->name,
			'id_turn' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'ruta' => $this->faker->name,
        ];
    }
}

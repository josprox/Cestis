<?php

namespace Database\Factories;

use App\Models\Publicacione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublicacioneFactory extends Factory
{
    protected $model = Publicacione::class;

    public function definition()
    {
        return [
			'iduser' => $this->faker->name,
			'titulo' => $this->faker->name,
			'vista' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}

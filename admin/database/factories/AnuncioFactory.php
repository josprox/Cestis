<?php

namespace Database\Factories;

use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnuncioFactory extends Factory
{
    protected $model = Anuncio::class;

    public function definition()
    {
        return [
			'imagen' => $this->faker->name,
			'contenido' => $this->faker->name,
        ];
    }
}

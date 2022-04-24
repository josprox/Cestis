<?php

namespace Database\Factories;

use App\Models\Argpublic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArgpublicFactory extends Factory
{
    protected $model = Argpublic::class;

    public function definition()
    {
        return [
			'id_mst' => $this->faker->name,
			'id_pbc' => $this->faker->name,
			'id_gradgrup' => $this->faker->name,
			'id_esp' => $this->faker->name,
			'id_turno' => $this->faker->name,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Turno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TurnoFactory extends Factory
{
    protected $model = Turno::class;

    public function definition()
    {
        return [
			'turno' => $this->faker->name,
        ];
    }
}

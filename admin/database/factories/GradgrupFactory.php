<?php

namespace Database\Factories;

use App\Models\Gradgrup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GradgrupFactory extends Factory
{
    protected $model = Gradgrup::class;

    public function definition()
    {
        return [
			'grado' => $this->faker->name,
			'grupo' => $this->faker->name,
        ];
    }
}

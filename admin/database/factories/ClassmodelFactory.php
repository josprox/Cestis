<?php

namespace Database\Factories;

use App\Models\Classmodel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClassmodelFactory extends Factory
{
    protected $model = Classmodel::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'clase' => $this->faker->name,
        ];
    }
}

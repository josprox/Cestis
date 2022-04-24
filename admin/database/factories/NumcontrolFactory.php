<?php

namespace Database\Factories;

use App\Models\Numcontrol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NumcontrolFactory extends Factory
{
    protected $model = Numcontrol::class;

    public function definition()
    {
        return [
			'num' => $this->faker->name,
			'curp' => $this->faker->name,
        ];
    }
}

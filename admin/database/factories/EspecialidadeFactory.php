<?php

namespace Database\Factories;

use App\Models\Especialidade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EspecialidadeFactory extends Factory
{
    protected $model = Especialidade::class;

    public function definition()
    {
        return [
			'especialidad' => $this->faker->name,
        ];
    }
}

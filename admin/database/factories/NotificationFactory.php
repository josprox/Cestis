<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'Contenido' => $this->faker->name,
        ];
    }
}

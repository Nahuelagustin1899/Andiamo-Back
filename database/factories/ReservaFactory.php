<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Viaje;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'viaje_id' => Viaje::factory(),
            'estado' => $this->faker->boolean,
        ];
    }
}

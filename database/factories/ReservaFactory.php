<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asiento;
use App\Models\Reserva;
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
            'estado' => $this->faker->boolean,
            'asiento_id' => Asiento::factory(),
            'viaje_id' => Viaje::factory(),
        ];
    }
}

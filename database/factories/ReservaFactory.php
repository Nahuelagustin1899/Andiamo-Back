<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asiento;
use App\Models\Reserva;
use App\Models\Usuario;
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
            'viaje_id' => Viaje::factory(),
            'usuario_id' => Usuario::factory(),
            'asiento_id' => Asiento::factory(),
        ];
    }
}

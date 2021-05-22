<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;
use App\Models\Estacion;
use App\Models\Usuario;
use App\Models\Viaje;

class ViajeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Viaje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::factory(),
            'empresa_id' => Empresa::factory(),
            'salida_id' => Estacion::factory(),
            'destino_id' => Estacion::factory(),
            'fecha_salida' => $this->faker->dateTime(),
            'fecha_llegada' => $this->faker->dateTime(),
            'cantidad_asientos' => $this->faker->numberBetween(-10000, 10000),
            'precio' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}

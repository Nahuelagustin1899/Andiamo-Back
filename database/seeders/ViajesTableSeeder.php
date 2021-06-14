<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Viaje;

class ViajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Viaje::create([
            'id' => 1,
            'empresa_id' =>1,
            'salida_id' =>1,
            'destino_id' =>6,
            'fecha_salida' => "2021-01-22 18:18:18",
            'fecha_llegada' => "2021-01-22 20:20:20",
            'cantidad_asientos' =>'40',
            'precio' =>3000

        ]);

        Viaje::create([
            'id' => 2,
            'empresa_id' =>3,
            'salida_id' =>3,
            'destino_id' =>5,
            'fecha_salida' => "2021-10-22 18:18:18",
            'fecha_llegada' => "2021-11-22 20:20:20",
            'cantidad_asientos' =>'40',
            'precio' => 6000

        ]);

        Viaje::create([
            'id' => 3,
            'empresa_id' =>3,
            'salida_id' =>2,
            'destino_id' =>4,
            'fecha_salida' => "2021-10-22 18:18:18",
            'fecha_llegada' => "2021-11-22 20:20:20",
            'cantidad_asientos' =>'40',
            'precio' => 4000

        ]);
    }
}

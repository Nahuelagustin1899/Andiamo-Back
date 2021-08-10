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
            'empresa_id' =>1,
            'salida_id' =>1,
            'destino_id' =>6,
            'fecha_salida' => "2021-08-22 23:00:00",
            'fecha_llegada' => "2021-08-23 08:00:20",
            'cantidad_asientos' =>'40',
            'precio' =>3000

        ]);

        Viaje::create([
            'empresa_id' =>5,
            'salida_id' =>3,
            'destino_id' =>5,
            'fecha_salida' => "2021-10-22 18:26:00",
            'fecha_llegada' => "2021-10-23 08:20:00",
            'cantidad_asientos' =>'40',
            'precio' => 6000

        ]);

        Viaje::create([
            'empresa_id' =>5,
            'salida_id' =>2,
            'destino_id' =>4,
            'fecha_salida' => "2021-10-25 23:18:18",
            'fecha_llegada' => "2021-10-26 10:20:20",
            'cantidad_asientos' =>'40',
            'precio' => 5000

        ]);

        Viaje::create([
            'empresa_id' =>3,
            'salida_id' =>1,
            'destino_id' =>7,
            'fecha_salida' => "2021-11-05 17:30:18",
            'fecha_llegada' => "2021-11-06 03:20:20",
            'cantidad_asientos' =>'40',
            'precio' => 3500

        ]);

        Viaje::create([
            'empresa_id' =>4,
            'salida_id' =>3,
            'destino_id' =>7,
            'fecha_salida' => "2021-11-11 20:30:18",
            'fecha_llegada' => "2021-11-12 05:20:20",
            'cantidad_asientos' =>'40',
            'precio' => 5000

        ]);

        Viaje::create([
            'empresa_id' =>2,
            'salida_id' =>2,
            'destino_id' =>8,
            'fecha_salida' => "2021-11-15 19:30:18",
            'fecha_llegada' => "2021-11-16 05:30:20",
            'cantidad_asientos' =>'40',
            'precio' => 3600

        ]);
    }
}

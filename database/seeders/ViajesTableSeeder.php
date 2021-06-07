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
            'destino_id' =>2,
            'fecha_salida' => "2021-01-22 18:18:18",
            'fecha_llegada' => "2021-01-22 20:20:20",
            'cantidad_asientos' =>'20',
            'precio' =>3000

        ]);

        Viaje::create([
            'id' => 2,
            'empresa_id' =>3,
            'salida_id' =>4,
            'destino_id' =>5,
            'fecha_salida' => "2021-10-22 18:18:18",
            'fecha_llegada' => "2021-11-22 20:20:20",
            'cantidad_asientos' =>'20',
            'precio' => 6000

        ]);
    }
}

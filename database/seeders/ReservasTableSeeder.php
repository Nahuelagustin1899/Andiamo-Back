<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Seeder;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 2,
            'estado' => 0,
            'asiento_reservado' => 15,
        ]);

        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 1,
            'estado' => 0,
            'asiento_reservado' => 18,
        ]);

        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 4,
            'estado' => 0,
            'asiento_reservado' => 2,
        ]);

        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 5,
            'estado' => 0,
            'asiento_reservado' => 19,
        ]);

        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 6,
            'estado' => 0,
            'asiento_reservado' => 6,
        ]);

        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 3,
            'estado' => 0,
            'asiento_reservado' => 2,
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Nahuel Lopez',
            'logo' => 'admin.png',
            'rol' => 1,
            'email' => "nahuel@admin.com",
            'password' => Hash::make('asdasd'),
        ]);

        User::create([
            'id' => 2,
            'name' => 'Ruta Atlántica',
            'logo' => 'ruta.jpg',
            'rol' => 2,
            'email' => "ruta@atlantica.com",
            'password' => Hash::make('asdasd'),
        ]);

        User::create([
            'id' => 3,
            'name' => 'Carlos Tevez',            
            'logo' => 'tevez.png',
            'rol' => 3,
            'email' => "carlos@tevez.com",
            'password' => Hash::make('asdasd'),
        ]);
    }
}

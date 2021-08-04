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
            'name' => 'Administrador Andiamo',
            'logo' => 'andiamo.png',
            'rol' => 1,
            'email' => "andiamo@admin.com",
            'password' => Hash::make('asdasd'),
        ]);

        User::create([
            'name' => 'Ruta Atlántica',
            'logo' => 'ruta.jpg',
            'rol' => 2,
            'email' => "ruta@atlantica.com",
            'password' => Hash::make('asdasd'),
        ]);

        User::create([
            'name' => 'Martin Vilas',            
            'logo' => 'usuario1.jpg',
            'rol' => 3,
            'email' => "martin@vilas.com",
            'password' => Hash::make('asdasd'),
        ]);
    }
}

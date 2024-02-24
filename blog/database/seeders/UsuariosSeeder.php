<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear y guardar usuarios en la base de datos
        Usuario::create([
            'login' => 'david',
            'password' => Hash::make('david'),
        ]);

        Usuario::create([
            'login' => 'paredes',
            'password' => Hash::make('paredes'),
        ]);

        // Agrega más usuarios si lo deseas
    }
}

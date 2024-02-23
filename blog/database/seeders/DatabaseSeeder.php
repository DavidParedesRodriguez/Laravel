<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Usuario;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        /*
        // Ejecutar el seeder de usuarios primero para obtener los IDs de los usuarios
        $this->call(UsuariosSeeder::class);

        // Obtener todos los IDs de usuarios
        $userIds = Usuario::pluck('id');

        // Crear 10 posts y asignar aleatoriamente un usuario a cada uno
        Post::factory(10)->create([
            'usuario_id' => $userIds->random(),
        ]);
        */

        $this->call([
            UsuariosSeeder::class,
            PostsSeeder::class,
        ]);
    }
}

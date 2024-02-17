<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los usuarios
        $users = Usuario::all();

        // Crear 3 posts para cada usuario
        $users->each(function ($user) {
            Post::factory()->count(3)->create(['usuario_id' => $user->id]);
        });
    }
}


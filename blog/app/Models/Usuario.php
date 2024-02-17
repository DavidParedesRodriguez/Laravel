<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importar el trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory; // Usar el trait HasFactory

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProtegidoController extends Controller
{
    public function protegido()
    {
        // Obtener el nombre del usuario autenticado
        $nombreUsuario = Auth::user()->name;

        // Devolver el mensaje de bienvenida con el nombre del usuario
        return "Bienvenido/a $nombreUsuario a la zona protegida.";
    }
}

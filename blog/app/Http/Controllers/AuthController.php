<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para mostrar el formulario de login
    public function showLoginForm()
    {
        return view('posts.login');
    }

    // Método para autenticar al usuario
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended(route('posts.index'));
        } else {
            $error = 'Credenciales incorrectas';
            return view('posts.login', compact('error'));
        }
    }


     // Método para cerrar sesión
     public function logout(Request $request)
     {
         Auth::logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect('/');
     }
}

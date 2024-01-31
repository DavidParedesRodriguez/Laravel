<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Listado de posts');
});

Route::get('/posts', function () {
    return ('Listado de posts');
});


Route::get('fecha', function () {
    return date("d/m/y h:i:s");
});

/*
Route::get('saludo/{nombre}', function ($nombre) {
    return "Hola, " . $nombre;
});

Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
    return "Hola, " . $nombre;
});


Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
    return "Hola, " . $nombre;
})->where('nombre', "[A-Za-z]+");
*/

/*
------------------------------------------------------------------------------------------------------------------
Ejercicio 1

Sobre el proyecto blog de la sesión anterior, vamos a añadir estos dos cambios:

Añade una nueva ruta parametrizada a posts/{id} ,
de manera que el parámetro id sea numérico (es decir, sólo contenga dígitos del 0 al 9) y obligatorio.
Haz que la ruta devuelva el mensaje "Ficha del post XXXX", siendo XXXX el id que haya recibido como parámetro.

*/

Route::get('posts/{id}', function ($id) {
    return "Ficha del post $id";
})->where('id', "[0-9]")->name('posts_ficha');

/*Pon un nombre a las tres rutas que hay definidas hasta ahora: a la página de inicio ponle el nombre "inicio",
a la del listado la llamaremos "posts_listado" y a la de ficha que acabas de crear, la llamaremos "posts_ficha".*/

Route::get('/', function () {
    return "Página de Inicio";
})->name('inicio');


Route::get('listado', function () {
    return "Página de listado";
})->name('posts_listado');


Route::get('/', function () {
    return "Página de Inicio";
})->name('inicio');

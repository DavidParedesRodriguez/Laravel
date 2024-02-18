<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use PhpParser\Node\Expr\PostDec;

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

/*
Route::get('/', function () {
    return "Página de Inicio";
})->name('inicio');
*/

Route::get('listado', function () {
    return "Página de listado";
})->name('posts_listado');


Route::get('saludo/{nombre?}/{id?}', function ($nombre = "Invitado", $id = 0) {
    return "Hola $nombre, tu código es el $id";
})->where('nombre', "[A-Za-z]+")->where('id', "[0-9]+")->name('posts_ficha');

/*--------------------------------------------------------------------------------------*/

/*
Route::get('/', function () {
    $nombre = "David";
    return view('inicio', compact('nombre'));
    //return view('inicio', ['nombre' => $nombre]);
    //return view('inicio')->with('nombre', $nombre);
});
*/
Route::view('/', 'inicio', ['nombre' => 'Nacho']);
/*
Route::get('/', function () {
    return "Página de Inicio";
})->name('inicio');
*/

Route::get('/', function () {
    return view('inicio');
})->name('inicio');


Route::get('contacto', function () {
    return "Página de contacto";
})->name('ruta_contacto');


/*Ejercicio 2*/
Route::get('listado', function () {
    $libros = array(
        array("titulo" => "El juego de Ender", "autor" => "Orson Scott Card"),
        array("titulo" => "La tabla de Flandes", "autor" => "Arturo Pérez Reverte"),
        array("titulo" => "La historia interminable","autor" => "Michael Ende"),
        array( "titulo" => "El Señor de los Anillos","autor" => "J.R.R. Tolkien")
    );
    return view('posts.listado', compact('libros'));
});

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('listado', function () {
    return view('posts.listado');
})->name('listado_posts');

Route::get('ficha/{id}', function ($id) {
    return view('posts.ficha', compact('id'));
})->name('ficha_post');

//T3: Ejercicio 1
Route::resource('posts', PostController::class)->only([
    'index', 'show', 'edit'
]);


Route::get('/posts/editar', [PostController::class, 'edit'])->name('posts.edit');
/*
Route::get('/posts/crear', [PostController::class, 'create'])->name('posts.create');
*/

/*
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
*/

//t4 ej2

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/nuevo-prueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
Route::post('/posts/editar-prueba', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');

//t6 formulario
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');











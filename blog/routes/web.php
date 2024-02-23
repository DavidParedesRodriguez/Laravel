<?php



use Illuminate\Support\Facades\Route;



use App\Http\Controllers\PostController;



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



/*

Route::get('/', function () {

    return view('welcome');

});

*/

/*

Route::get('/posts', function () {

    return 'Listado de posts ruta';

});

*/

/*

Route::get('/posts/{id?}', function ($id = 1) {

    return ('Ficha del post: ' . $id);

}) -> where('id', '[0-9]+') ;

*/



Route::get('/', function () {

    return view('inicio');

})->name('inicio');



Route::resource('posts', PostController::class)->only(['create', 'index', 'edit', 'update','show']);

//index
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


// Rutas temporales para probar inserciones y modificaciones

Route::post('/posts/nuevo-prueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');


Route::put('/posts/editar-prueba/{id}', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');

//ELIMINAR POSTS
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//eliminar el post desde el show.blade.php
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');



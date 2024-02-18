<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importar el modelo Post
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('post.index');
        $posts = Post::orderBy('titulo', 'asc')->paginate(5);
        return view('posts.postIndex', compact('posts'));
    }

    /**
     * Show the specified resource.
     */

    /*
    public function show($id)
    {
        return view('posts.show');
    }
*/

    public function show($id)
    {
        /*
        $detalle = $this->edit(); // Llamada al método edit()
        return view('posts.show', compact('detalle'));
        */
        // Obtener el post por su ID
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
     {
         return view('posts.create');
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //return "Edición de post";
        return redirect()->route('inicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Método para almacenar el nuevo post en la base de datos
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
    ]);

    // Crear un nuevo post con los datos del formulario
    $post = new Post();
    $post->titulo = $request->titulo;
    $post->contenido = $request->contenido;
    // Asignar el usuario predefinido (puedes cambiar esto más adelante)
    $post->user_id = 1; // Suponiendo que el usuario predefinido tiene ID 1
    $post->save();

    // Redirigir al listado principal de posts
    return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el post por su ID
        $post = Post::findOrFail($id);

        // Eliminar el post
        $post->delete();

        // Redirigir a la página de listado de posts
        return redirect('/posts')->with('success', 'Post eliminado correctamente.');
    }


    public function nuevoPrueba()
    {
        $titulo = "Título " . rand();
        $contenido = "Contenido " . rand();
        Post::create(['titulo' => $titulo, 'contenido' => $contenido]);
        return redirect()->route('post.index')->with('success', 'Post de prueba creado correctamente.');
    }

    public function editarPrueba(Request $request)
    {
        // Obtener el ID del post del formulario
        $id = $request->input('postId');

        // Buscar el post por su ID
        $post = Post::find($id);

        // Verificar si se encontró el post
        if ($post) {
            // Generar un título y contenido aleatorios
            $titulo = "Título " . rand();
            $contenido = "Contenido " . rand();

            // Actualizar el título y contenido del post
            $post->titulo = $titulo;
            $post->contenido = $contenido;
            $post->save();

            // Redirigir a la página de listado de posts con un mensaje de éxito
            return redirect()->route('post.index')->with('success', 'Post de prueba editado correctamente.');
        } else {
            // Si no se encuentra el post, redirigir con un mensaje de error
            return redirect()->route('post.index')->with('error', 'No se encontró el post con el ID proporcionado.');
        }
    }
}

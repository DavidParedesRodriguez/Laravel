<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * index se asociaría con una operación GET de listado general, para obtener todos los registros
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     * store se asociaría con una operación POST, para almacenar los datos que lleguen en la petición
     */
    public function store(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Validar los datos del post
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear un nuevo post con los datos validados y el usuario asociado
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->usuario_id = $user->id; // Asignar el ID del usuario
        $post->save();

        // Devolver el post creado en formato JSON con el código de estado 201 (created)
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     * show se asociaría con una operación GET para obtener el registro asociado a un identificador concreto
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     * update se asociaría con una operación PUT, para actualizar los datos del registro asociado a un identificador concreto
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validated();
        $post->title = $validatedData['titulo'];
        $post->content = $validatedData['contenido'];
        $post->save();
        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     * destroy se asociaría con una operación DELETE, para eliminar los datos del registro asociado a un identificador concreto
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}

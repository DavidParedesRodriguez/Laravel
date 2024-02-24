<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\postsPost;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Usuario;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    return view('posts.index');

        //  return "index";

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  redirect()->route('index');
        // return "Nuevo post";
        // $posts = Post::get();
        $posts = Post::get()->first();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        // Obtener el usuario autenticado
        $usuarioAutenticado = auth()->user();

        // Crear un nuevo post con los datos del formulario y el usuario autenticado
        $post = new Post();
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->usuario_id = $usuarioAutenticado->id; // Asignar el ID del usuario autenticado
        $post->save();

        // Redirigir al listado de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::where('id', '=', $id)->get();
        //return view('posts.show', compact('post'));
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return "Edicion de post";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el post por su ID
        $post = Post::findOrFail($id);

        // Eliminar el post
        $post->delete();

        // Redirigir al listado de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente');
    }

    //metodos creados t4

    public function nuevoPrueba()
    {
        // Crear un nuevo usuario
        $usuario = new Usuario();
        $usuario->login = 'Usuario ' . rand();
        $usuario->password = bcrypt('contraseña'); // Asigna una contraseña encriptada
        $usuario->save();

        // Crear un nuevo post y asociarlo al usuario creado
        $post = new Post();
        $post->titulo = 'Título ' . rand(); // Generar un título aleatorio
        $post->contenido = 'Contenido ' . rand(); // Generar un contenido aleatorio
        $post->usuario_id = $usuario->id; // Asociar el post al usuario
        $post->save();

        // Redirigir a la página de listado de posts con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post de prueba creado correctamente.');
    }


    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);
        $post->titulo = 'Título ' . rand();
        $post->contenido = 'Contenido ' . rand();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post de prueba editado correctamente.');
    }
}

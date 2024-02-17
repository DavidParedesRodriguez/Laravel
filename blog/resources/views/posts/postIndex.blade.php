@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->titulo }}
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Ver</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Botón para crear un nuevo post de prueba -->
    <form action="{{ route('posts.nuevoPrueba') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-success">Crear Post de Prueba</button>
    </form>

    <!-- Formulario para editar un post de prueba -->
    <h2>Editar Post de Prueba</h2>
    <form action="{{ route('posts.editarPrueba') }}" method="POST">
        @csrf
        <label for="postId">ID del Post a Editar:</label>
        <input type="text" id="postId" name="postId">
        <button type="submit" class="btn btn-primary">Editar Post de Prueba</button>
</form @endsection

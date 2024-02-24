@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->titulo }}
                @if ($post->usuario)
                    ({{ $post->usuario->login }})
                @else
                    (Usuario desconocido)
                @endif
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Ver</a>

                <!-- Mostrar botones de edición y eliminación solo si el usuario autenticado es el propietario del post -->
                @auth
                    @if ($post->usuario_id === Auth::id())
                        <!-- Enlace para editar el post -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>

                        <!-- Formulario para eliminar el post -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>

    <!-- Botón para crear un nuevo post de prueba -->
    <form action="{{ route('posts.create') }}" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-success">Crear Post</button>
    </form>
@endsection

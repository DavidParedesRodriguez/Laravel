@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>
    <ul>
        @foreach ($posts as $p)
            <li>
                {{ $p->titulo }}
                @if ($p->usuario)
                    ({{ $p->usuario->login }})
                @else
                    (Usuario desconocido)
                @endif
                <a href="{{ route('posts.show', $p->id) }}" class="btn btn-primary">Ver</a>

                <!-- Botón para editar el post -->

                <!-- Enlace para editar el post -->
                <form action="{{ route('posts.editarPrueba', $p->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>

                <!-- Formulario para eliminar el post -->
                <form action="{{ route('posts.destroy', $p->id) }}" method="POST" style="display: inline;">
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
@endsection

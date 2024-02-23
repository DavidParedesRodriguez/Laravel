@extends('plantilla')
@section('titulo', 'Ficha post')

@section('contenido')
    <h1>{{ $post->titulo }}</h1>
    <p>{{ $post->contenido }}</p>
    <p>Fecha de creación: {{ $post->created_at }}</p>
    <p>Fecha de actualización: {{ $post->updated_at }}</p>

    <!-- Botón y formulario para borrar el post -->
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este post?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Post</button>
    </form>
@endsection

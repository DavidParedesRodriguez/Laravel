@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Edicion post</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->titulo }}</a>
            </li>
        @endforeach
    </ul>
@endsection


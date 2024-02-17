@extends('plantilla')

@section('titulo', 'Ficha del Post')

@section('contenido')
    <h2>{{ $post->titulo }}</h2>
    <p>{{ $post->contenido }}</p>
    <p>Fecha de creación: {{ $post->created_at }}</p>
@endsection

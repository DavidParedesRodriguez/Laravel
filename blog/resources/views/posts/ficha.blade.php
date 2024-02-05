@extends('plantilla')
@section('titulo', 'Ficha del Post ' . $id)
@section('contenido')
    <h1>Ficha del post {{ $id }}</h1>
@endsection

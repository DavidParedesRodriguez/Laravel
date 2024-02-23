@extends('plantilla')
@section('titulo', '"Listado posts')
@section('contenido')

    <h1>Nuevo libro</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}">
            <!--mensaje personalizado-->
            @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        </div>

        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <input type="text" class="form-control" name="contenido" id="contenido" value="{{ old('contenido') }}">
             <!--mensaje personalizado-->
            @error('contenido')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
    </form>

@endsection

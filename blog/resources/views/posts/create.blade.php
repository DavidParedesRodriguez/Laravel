@extends('plantilla')

@section('titulo', 'Nuevo Post')

@section('content')
    <div class="container">
        <h2>Crear nuevo post</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5"></textarea>
            </div>
            <!-- Aquí podrías agregar un campo oculto para el id del autor si lo deseas -->
            <button type="submit" class="btn btn-primary">Crear Post</button>
        </form>
    </div>
@endsection

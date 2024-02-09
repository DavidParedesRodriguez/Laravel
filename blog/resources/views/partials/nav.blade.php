<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('inicio') }}">Inicio</a>
    <a class="navbar-brand" href="{{ route('listado_posts') }}">Listado de posts</a>
    <a class="navbar-brand" href="{{ route('posts.create') }}">Crear Post</a>
    <a class="navbar-brand" href="{{ route('posts.edit', ['id' => 1]) }}">Editar Post</a>
</nav>

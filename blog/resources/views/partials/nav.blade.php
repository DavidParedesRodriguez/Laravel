<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('inicio') }}">Inicio</a>
    <a class="navbar-brand" href="{{ route('posts.index') }}">Ver Posts</a>
    @auth
        <a class="navbar-brand" href="{{ route('posts.create') }}">Crear Post</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form>
    @else
        <a class="navbar-brand" href="{{ route('login') }}">Login</a>
    @endauth
</nav>


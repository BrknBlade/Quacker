<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>{{ $user->name }}</title>
</head>
<body>
    <x-layout />
    <div class="quack">
        <p>{{ $user->name }}</p>
        <p>Quacks publicados: {{ count($user->quacks) }}</p>
        <p>Seguidores: {{ count($user->followers) }}</p>
        <p>Siguiendo: {{ count($user->following) }}</p>
        <p>Popularidad: {{ $quavs }}</p>
        <p>Viralidad: {{ $requacks }}</p>
        @if(Auth::user()->id != $user->id)
            @if(sizeof($following) > 0)
                <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                    @csrf
                    <button type="submit">Unfollow</button>
                </form>
            @else
                <form action="{{ route('users.follow', $user->id) }}" method="post">
                    @csrf
                    <button type="submit">Follow</button>
                </form>
            @endif
        @else
            <a href="{{ route('users.edit', Auth::user()->id) }}" class="edit_button">Editar</a>
        @endif
        <a href="{{ route('user.quacks', $user->id) }}">Ver Quacks</a>
    </div>
</body>
</html>

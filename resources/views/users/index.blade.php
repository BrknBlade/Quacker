<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Usuarios</title>
</head>
<body>
    <x-layout />
    @foreach ($users as $user)
        <div class="quack">
            <p>{{ $user->name }}</p>
            <!-- <p>{{ $user->email }}</p> -->
            <!-- <p>{{ $user->created_at }}</p> -->
            <a href="{{ route('users.show', $user->id) }}">Detalles</a>
        </div>
    @endforeach
</body>
</html>

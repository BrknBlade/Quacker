<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>{{ $user->name }}</title>
</head>
<body>
    <x-layout>
        <div>
            <p>{{ $user->name }}</p>
        </div>
        <a href="/users">Volver</a>
    </x-layout>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Showing {{ $quack->titulo }}</title>
</head>
<body>
    <x-layout />
    <x-quack
        id="{{ $quack->id }}"
        titulo="{{ $quack->titulo }}"
        mensaje="{{ $quack->mensaje }}"
        img="{{ $quack->img }}"
        detalles="false"
        comentarios="true"
        user="{{ $quack->user_id }}"
        name="{{ $quack->author->name }}"
    />
</body>
</html>

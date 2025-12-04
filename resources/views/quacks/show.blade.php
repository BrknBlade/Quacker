<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Showing {{ $quack->nickname }}</title>
</head>
<body>
    <div class="quack">
        <h2>{{ $quack->nickname }}</h2>
        <p>{{ $quack->mensaje }}</p>
        <form method="post" action="/quacks/{{ $quack->id }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="delete_button">
        </form>
        <form method="get" action="/quacks/{{ $quack->id }}/edit">
            @csrf
            <input type="submit" value="Editar" class="edit_button">
        </form>
    </div>
</body>
</html>

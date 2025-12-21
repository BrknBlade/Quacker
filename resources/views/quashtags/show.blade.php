<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/styles/main.css">
        <title>Mostrando #{{ $quashtag->title }}</title>
    </head>
    <body>
        <x-layout />
        <div class="quashtag">
            <h2>#{{ $quashtag->title }}</h2>

            <form method="post" action="/quashtags/{{ $quashtag->id }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="delete_button">
            </form>
            <a href="/quashtags/{{ $quashtag->id }}/edit" class="edit_button">Editar</a>
        </div>
    </body>
</html>

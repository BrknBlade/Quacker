<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/styles/main.css">
        <title>Editando #{{ $quashtag->title }}</title>
    </head>
    <body>
        <x-layout />
        <form method="post" action="/quashtags/{{ $quashtag->id }}" class="form">
            @csrf
            @method('PATCH')

            <label for="title">Nombre del Quashtag:</label>
            <input id="title" type="text" name="title" value="{{ $quashtag->title }}">

            <input type="submit" value="Actualizar Quashtag" class="edit_button">
        </form>
    </body>
</html>

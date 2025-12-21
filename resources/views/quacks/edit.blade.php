<!DOCTYPE html>
<html lang="e">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Edit {{ $quack->nickname }}</title>
</head>
<body>
    <x-layout />
    <section class="auth_form">
        <form method="post" action="/quacks/{{ $quack->id }}" class="form">
            @csrf
            @method('PATCH')
            <label for="nickname">Titulo:</label>
            <input id="nickname" type="text" name="titulo" value="{{ $quack->titulo }}">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" cols="20">{{ $quack->mensaje }}</textarea>

            <input type="submit" value="Actualizar Quack" class="edit_button">
        </form>
    </section>
</body>
</html>

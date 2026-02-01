<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Crear Quack</title>
</head>
<body>
    <x-layout />
    <section class="auth_form">
        <form method="post" action="/quacks" class='form'>
            @csrf
            <label for="titulo">Titulo:</label>
            <input id="titulo" type="text" name="titulo" placeholder="Titulo del tu Quack">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" cols="20" placeholder="En que estas pensando hoy?"></textarea>

            <input type="submit" value="Publicar Quack" class="edit_button">
        </form>
    </section>
</body>
</html>

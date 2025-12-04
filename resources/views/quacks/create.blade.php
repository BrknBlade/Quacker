<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Crear Quack</title>
</head>
<body>
    <form method="post" action="/quacks" class='form'>
        @csrf
        <label for="nickname">Nickname:</label>
        <input id="nickname" type="text" name="nickname">

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" cols="20"></textarea>

        <input type="submit" value="Publicar Quack" class="edit_button">
    </form>
</body>
</html>

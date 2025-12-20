<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Quacker</title>
</head>

<body>
    <x-layout />
    @foreach ($quacks as $quack)
        <x-quack
            id="{{ $quack->id }}"
            nickname="{{ $quack->nickname }}"
            mensaje="{{ $quack->mensaje }}"
            img="{{ $quack->img }}"
            detalles="true"
            comentarios="false"
        />
    @endforeach
</body>

</html>

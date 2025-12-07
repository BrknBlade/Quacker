<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Quashtags</title>
</head>
<body>
    @foreach ($quashtags as $quashtag)
        <article class="quack">
            <h2>{{ $quashtag->title }}</h2>
            <p>{{ $quashtag->idQuashtag }}</p>
            <a href="/quashtags/{{ $quashtag->id }}">ver detalles</a>
            <div class="button_container">
                <form method="post" action="/quashtags/{{ $quashtag->id }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="delete_button">
                </form>
                <form method="get" action="/quashtags/{{ $quashtag->id }}/edit">
                    @csrf
                    <input type="submit" value="Editar" class="edit_button">
                </form>
            </div>
        </article>
    @endforeach
</body>
</html>

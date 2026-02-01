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
        <!--Falta centrarlo-->
        <section class="quashtag_quacks">
            <h3>Quacks con este quashtag</h3>

            <form method="GET" action="/quashtags/{{ $quashtag->id }}">
                <label for="order">Ordenar por fecha:</label>

                <select name="order" id="order" onchange="this.form.submit()">
                    <option value="desc" {{ ($order ?? 'desc') === 'desc' ? 'selected' : '' }}>
                        Más recientes primero
                    </option>

                    <option value="asc" {{ ($order ?? 'desc') === 'asc' ? 'selected' : '' }}>
                        Más antiguos primero
                    </option>
                </select>
            </form>
            <br>

            @forelse ($quacks as $quack)
                <x-quack
                    id="{{ $quack->id }}"
                    titulo="{{ $quack->titulo }}"
                    mensaje="{{ $quack->mensaje }}"
                    img="{{ $quack->img }}"
                    detalles="true"
                    comentarios="false"
                    user="{{ $quack->user_id }}"
                    name="{{ $quack->author->name }}"
                />
            @empty
                <p>No hay quacks con este quashtag.</p>
            @endforelse
        </section>
    </body>
</html>

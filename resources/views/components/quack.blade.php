<div class="quack">
    <p class="quack_username">{{ $name }}</p>
    <p class="quack_title">{{ $titulo }}</p>
    <p class="quack_content">{{ $mensaje }}</p>
    <img src="/img/{{ $img }}" alt="post_img">
    @if ($detalles != 'false')
        <a href="/feed/{{ $id }}" class="details_button">ver detalles</a>
    @endif
    @if ($user == Auth::user()->id)
        <div class="button_container">
            <form method="post" action="/feed/{{ $id }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="delete_button">
            </form>
            <a href="/feed/{{ $id }}/edit" class="edit_button">Editar</a>
        </div>
    @endif
    @if ($comentarios == 'true')
        <form class="comments">
            <input type="text" name="comentario" placeholder="Que estas pensando hoy?...">
            <input type="submit" value="Comentar">
        </form>

        <article>
            <p>Frank</p>
            <p>No me gusta este post</p>
        </article>
    @endif
        @if (trim($slot))
        <div class="quack_actions">
            {{ $slot }}
        </div>
    @endif
</div>

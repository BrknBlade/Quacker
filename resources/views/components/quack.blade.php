<div class="quack">
    <p class="quack_title">{{ $nickname }}</p>
    <p class="quack_content">{{ $mensaje }}</p>
    <img src="/img/{{ $img }}" alt="post_img">
    @if ($detalles != 'false')
        <a href="/quacks/{{ $id }}">ver detalles</a>
    @endif
    <div class="button_container">
        <form method="post" action="/quacks/{{ $id }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="delete_button">
        </form>
        <a href="/quacks/{{ $id }}/edit" class="edit_button">Editar</a>
    </div>
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
</div>

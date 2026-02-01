<header>
    <div class="header_menu_container">
        <nav>
            <a href="{{ route('quacks.index') }}" class="header_link">quacks</a>
            <a href="{{ route('quashtags.index') }}" class="header_link">quashtags</a>
            <a href="{{ route('users.index') }}" class="header_link">users</a>
        </nav>
        <nav>
            <p class="auth_user_name">{{ Auth::user()->name }}</p>
            <svg  class="icon" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <img class="user_img" src="/img/default_user.jpg" alt="user_img">
        </nav>
    </div>
</header>
<div class="float_menu">
    <a href="{{ route('user.quacks', Auth::user()->id) }}">Mis Quacks</a>
    <a href="{{ route('users.edit', Auth::user()->id) }}">Actualizar datos</a>
    <form action="/logout" method="POST" style="text-align: right; padding: 10px;">
        @csrf
        <input type="submit" value="Cerrar Sesión">
    </form>
</div>
<main>
    {{ $slot }}
</main>

<script>
const user = document.querySelector('.user_img');
const floatMenu = document.querySelector('.float_menu');

user.onclick = (e) => {
    floatMenu.classList.toggle('show_float_menu');
}
</script>

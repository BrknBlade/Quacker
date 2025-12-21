<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>
    <section class="auth_form_container">
        <div class="auth_form">
            <h2>Iniciar Sesión</h2>
            <form id="formularioBonico" class="form" action="/login" method="post">
                @csrf
                <div class="input_container">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Introduce aqui tu email..." required />
                    @error('email')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input_container">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Introduce aqui tu contraseña..." required />
                    @error('password')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="remember">
                    <label for="remember">Recuérdame</label>
                    <input type="checkbox" value="" id="remember" />
                </div>
                <input type="submit" value="Iniciar sesión" />
                <a href="/register">¿Olvidaste tu contraseña? Registrate de nuevo aquí</a>
            </form>
        </div>
    </section>
</body>
</html>

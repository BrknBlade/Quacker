<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>
    <section class="auth_form_container">
        <div class="auth_form">
            <h2>Registrar</h2>
            <div id="mensaje"></div>
            <form id="formularioBonico" class="form" action="/register" method="post">
                @csrf
                 <div class="input_container">
                    <label for="name">Name</label>
                    <input type="name" id="name" name="name" placeholder="Introduce aqui tu nombre..." required>
                </div>
                <div class="input_container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Introduce aqui tu email..." required>
                </div>
                <div class="input_container">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Introduce aqui tu contraseña..." required>
                </div>
                <div class="input_container">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" placeholder="Confirma aqui tu contraseña..." required>
                </div>
                <div class="remember">
                    <label for="remember">Recuérdame</label>
                    <input type="checkbox" value="" id="remember">
                </div>
                <input type="submit" value="Ingresar"/>
                <a href="/login">¿Nos vamos al Login?</a>
            </form>
        </div>
    </section>
</body>

</html>

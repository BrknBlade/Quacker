<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Iniciar sesión</h1>

<form method="POST" action="/login">
    @csrf

    <label for="email">Email</label><br>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label for="password">Contraseña</label><br>
    <input id="password" type="password" name="password">
    @error('password')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <button type="submit">Iniciar sesión</button>
</form>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <title>{{ $user->name }} Edit</title>
</head>
<body>
    <x-layout />
    <section class="auth_form_container">
        <div class="auth_form">
            <form id="formularioBonico" class="form" action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="input_container">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required />
                    @error('name')
                        <span style="color:#ff0068">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input_container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required />
                    @error('email')
                        <span style="color:#ff0068">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input_container">
                    <label for="password">Nuevo password</label>
                    <input type="password" id="password" name="password" placeholder="Nuevo password"/>
                    @error('password')
                        <span style="color:#ff0068">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Actualizar datos" />
            </form>
        </div>
    </section>
</body>
</html>

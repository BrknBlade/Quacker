<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Mostrar formulario de login
    public function create()
    {
        return view('auth.login');
    }

    // Procesar login
    public function store(SessionRequest $request)
    {
        $attributes = $request->validated();

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Las credenciales no son correctas'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/feed');
    }

    // Logout
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalida la sesión actual del usuario
        $request->session()->invalidate();

        // Regenera el token CSRF para evitar ataques
        $request->session()->regenerateToken();

        return redirect('/')->with('success', '¡Has cerrado sesión correctamente!');
    }
}

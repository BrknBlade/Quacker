<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SessionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {

         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            //Hashear contraseña cuando se pueda
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect(route('login'));

    }



}



?>
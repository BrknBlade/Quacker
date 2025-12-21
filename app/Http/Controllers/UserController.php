<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Display the quacks quacked by the authenticated user
     */
    public function quacks() {
        return view('quacks.user.show', [
            'quacks' => Auth::user()->quacks()->get()
        ]);
    }
}

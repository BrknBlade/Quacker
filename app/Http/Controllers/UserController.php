<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: This shlould return the register view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: pesar en como see almacena esto, si es SessionController o aquie en nuser controller
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // WARNING: Edit an user is not an option
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // NOTE: It's not necesary right now but maybe we need a user connnfig view
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // NOTE: User can delete his own account. At the moment you don't need confirmation
    }
}

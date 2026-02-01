<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Quack;
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
            'user' => $user,
            'following' => $user->followers()->where('follower_id', '=', Auth::user()->id)->get(),
            'quavs' => $user->quacks()->withCount('likes')->get()->sum('likes_count'),
            'requacks' => $user->quacks()->withCount('requackers')->get()->sum('requackers_count')
        ]);
    }

    public function edit() {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(User $user, UpdateUserRequest $request) {
        if($request->password == '') { // Esto es muy cutre, pero no queria comerme la cabeza
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        } else {
            $user->update($request->all());
        }
        return redirect(route('users.edit', Auth::user()->id));
    }

    /**
     * Display the quacks quacked by the authenticated user
     */
    public function quacks(User $user) {
        return view('quacks.user.show', [
            'quacks' => $user->quacks()->get()
        ]);
    }

    public function follow(User $user) {
        $user->followers()->syncWithoutDetaching(Auth::user()->id);
        return redirect(route('users.show', $user->id));
    }

    public function unfollow(User $user) {
        $user->followers()->detach(Auth::user()->id);
        return redirect(route('users.show', $user->id));
    }
}

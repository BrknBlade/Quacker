<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuackRequest;
use App\Http\Requests\UpdateQuackRequest;
use App\Models\Quack;
use App\Models\Quashtag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       /*  $user = Auth::user();

        $quacks = $user->quacks()
            ->with(['author:id,name'])
            ->withCount(['likes', 'requackers'])
            ->get();

       /*  $quacks = Quack::latest()->with([
            'author:id,name'
        ])->withCount(['likes', 'requackers'])
        ->get(); 
        
        return view('quacks.index', compact('quacks')); */


        $quacks = Auth::user()->following->map(function($user) {
            return $user->feed;
        })->flatten()
        ->merge(Auth::user()->feed)
        ->sortByDesc('feed_date');

        return view('quacks.index', [
            'quacks' => $quacks->map(function($quack) {
                $quack->loadCount(['likes', 'requackers']);
                return $quack;
            })
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuackRequest $request)
    {
        $user = Auth::user();

        // Esto asocia automáticamente el user_id
        $quack = $user->quacks()->create($request->all());

        //para que sepa que $quack es un Quack
        /** @var \App\Models\Quack $quack */
        preg_match_all('/#(\w+)/u', $quack->mensaje, $matches);

        $quashtagNames = array_unique($matches[1]);

        if (!empty($quashtagNames)) {
            $quashtagIds = [];

            foreach ($quashtagNames as $title) {
                $quashtag = Quashtag::firstOrCreate(['title' => $title]);
                $quashtagIds[] = $quashtag->id;
            }

            //he usado sync antes de lo que sugerio Ignacio porque al parecer es mejor en varias cosas
            $quack->quashtags()->sync($quashtagIds);
        }

        return redirect('feed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack )
    {
        $quack->load(['author:id,name'])
            ->loadCount(['likes', 'requackers']);

        return view('quacks.show', [
            'quack' => $quack
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        return view('quacks.edit', [
            'quack' => $quack
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuackRequest $request, Quack $quack)
    {
        $quack->update($request->all());
        return redirect('feed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        $quack->delete();
        return redirect('feed');
    }

    public function like(Quack $quack)
    {
        //para que sepa que $user es un User
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($user->likedQuacks()->where('quack_id', $quack->id)->exists()) {
            $user->likedQuacks()->detach($quack->id);
        } else {
            $user->likedQuacks()->attach($quack->id);
        }

        return back();
    }

    public function requack(Quack $quack)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($user->requackedQuacks()->where('quack_id', $quack->id)->exists()) {
            $user->requackedQuacks()->detach($quack->id);
        } else {
            $user->requackedQuacks()->attach($quack->id);
        }

        return back();
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuashtagRequest;
use App\Http\Requests\UpdateQuashtagRequest;
use App\Models\Quashtag;

class QuashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quashtags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quashtags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuashtagRequest $request)
    {
        Quashtag::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Quashtag $quashtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quashtag $quashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuashtagRequest $request, Quashtag $quashtag)
    {
        $quashtag->update($request->all());
        return redirect('quacks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quashtag $quashtag)
    {
        //Eliminar el quashtag
        $quashtag->delete();
        return redirect('quacks');
    }
}

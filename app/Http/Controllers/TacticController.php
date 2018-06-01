<?php

namespace App\Http\Controllers;

use App\Tactic;
use Illuminate\Http\Request;

class TacticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tactics = Tactic::all();
        return view('tactic.index', compact('tactics', $tactics));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'type' => 'string|required',
            'FKteamID' => 'integer|required',
        ]);

        Tactic::create([
            'tacticName' => $request->name,
            'tacticDescription' => $request->description,
            'tacticType' => $request->type,
            'FKteamID' => $request->FKteamID,
        ]);

        return back()->with('succes', 'De tactiek '.$request->name.' is succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function show(Tactic $tactic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function edit(Tactic $tactic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tactic $tactic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tactic $tactic)
    {
        //
    }
}

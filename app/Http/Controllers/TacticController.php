<?php

namespace App\Http\Controllers;

use App\Tactic;
use App\Team;
use App\PlayersInTactic;
use App\Coordinate;
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
        return view('tactics.index', compact('tactics', $tactics));
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
        $playersInTactic = PlayersInTactic::where('FKtacticID', $tactic->id)->get();
        $pitID = array();
        foreach($playersInTactic as $player){
            array_push($pitID, $player->id);
        }

        $coordinates = Coordinate::whereIn('FKplayersInTacticID', $pitID)->get();

        $max = Coordinate::whereIn('FKplayersInTacticID', $pitID)->max('step');

        $team = Team::where('id', $tactic->FKteamID)->first();
        return view('tactics.show', compact('tactic', $tactic, 'team', $team, 'coordinates', $coordinates, 'max', $max));
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

    public function addPlayer(Request $request)
    {
        $playersInTactic = PlayersInTactic::create([
            'FKtacticID' => $request->tacticID,
            'FKplayerID' => $request->playerID,
        ]);

        return back()->with('succes', 'Gelukt!');
    }

    public function addCoordinate(Request $request)
    {
        $player = PlayersInTactic::where('FKtacticID', $request->tacticID)
            ->where('FKplayerID', $request->playerID)->first();

        $coordinate = Coordinate::create([
            'FKplayersInTacticID' => $player->id,
            'xCoordinate' => $request->x,
            'yCoordinate' => $request->y,
            'step' => $request->step,
        ]);

        return back()->with('succe', 'Extra positie toegevoegd');
    }
}

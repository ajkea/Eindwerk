<?php

namespace App\Http\Controllers;

use App\Tactic;
use App\Team;
use App\PlayersInTactic;
use App\Coordinate;
use DB;
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
        // return $pitID;
        $coordinates = Coordinate::whereIn('FKplayersInTacticID', $pitID)
            ->orderBy('FKplayersInTacticID', 'asc')
            ->orderBy('step', 'asc')
            ->get();
            
        // return $coordinates;

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

        $playerCoordinateExistTest = DB::table('coordinates')
            ->where('step', $request->step)
            ->where('FKplayersInTacticID', $player->id)
            ->count();
            
        // return $playerCoordinateExistTest;
        if ($playerCoordinateExistTest == 0){
            $coordinate = Coordinate::create([
                'FKplayersInTacticID' => $player->id,
                'xCoordinate' => $request->x,
                'yCoordinate' => $request->y,
                'step' => $request->step,
            ]);
        }
        else {
            return back()->with('error', 'Deze speler heeft al een positie in deze stap.')->withInput();
        }

        return back()->with('succes', 'Extra positie toegevoegd')->withInput();
    }

    public function removeCoordinate(Request $request)
    {
        $minX = ($request->x - 12);
        $maxX = ($request->x + 12);
        $minY = ($request->y - 10);
        $maxY = ($request->y + 10);
        $coordinate = DB::table('coordinates')
            ->whereBetween('xCoordinate',[$minX,$maxX])
            ->whereBetween('yCoordinate',[$minY,$maxY])
            ->where('step', $request->step)
            ->first();

        if (!empty($coordinate->id)){
            Coordinate::destroy($coordinate->id);
            return back()->with('succes', 'Coördinaat verwijderd')->withInput();
        }
        else {
            return back()->with('error', 'Coördinaat bestaat niet')->withInput();
        }
    }

    public function EditCoordinate(Request $request)
    {
        $minStartX = ($request->xStart - 12);
        $maxStartX = ($request->xStart + 12);
        $minStartY = ($request->yStart - 10);
        $maxStartY = ($request->yStart + 10);

        $endX = ($request->xEnd);
        $endY = ($request->yEnd);

        $coordinate = DB::table('coordinates')
            ->whereBetween('xCoordinate',[$minStartX,$maxStartX])
            ->whereBetween('yCoordinate',[$minStartY,$maxStartY])
            ->where('step', $request->step)
            ->first();

        if (!empty($coordinate->id)){
            $newCoordinate = Coordinate::find($coordinate->id);

            $newCoordinate->xCoordinate = $endX;
            $newCoordinate->yCoordinate = $endY;

            $newCoordinate->save();

            return back()->with('succes', 'Coördinaat bijgewerkt')->withInput();
        }
        else {
            return back()->with('error', 'Coördinaat bestaat niet')->withInput();
        }
    }
}
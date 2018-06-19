<?php

namespace App\Http\Controllers;

use App\UserTeam;
use App\Team;
use App\User;
use App\Player;
use App\PlayersInTeam;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', auth()->user()->id)
            ->get();
        return view('teams.index', compact('teams', $teams));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'teamName' => 'string|required',
            'teamDescription' => 'string|required',
        ]);

        $team = Team::create([
            'teamName' => $request->teamName,
            'teamDescription' => $request->teamDescription,
        ]);

        $FKuserID = Auth::id();
        $FKteamID = Team::where('teamName',$request->teamName)->latest()->first();

        $userTeam = UserTeam::create([
            'FKuserID' => $FKuserID,
            'FKteamID' => $FKteamID->id,

        ]);
        
        $ball = Player::where('FKpositionID', '=', '1')->first();
        PlayersInTeam::create([
            'FKplayerID' => $ball->id,
            'FKteamID' => $FKteamID->id,
        ]);

        $enemy = Player::where('FKpositionID', '=', '2')->first();
        PlayersInTeam::create([
            'FKplayerID' => $enemy->id,
            'FKteamID' => $FKteamID->id,
        ]);

        return back()->with('succes', 'Je hebt '.$request->teamName.' succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $team = Team::find($team->id);

        $teamOriginal = Team::where('teamName', '=', Auth::user()->firstName)->first();
        $players = Player::join('players_in_teams', 'players_in_teams.FKplayerID', '=', 'players.id')
        ->join('teams', 'teams.id', '=', 'players_in_teams.FKteamID')
        ->where('teams.teamName', '=', Auth::user()->firstName)
        ->where('players_in_teams.FKplayerID', '=', 'players.id')
        ->where('players_in_teams.FKteamID', '<>', $team->id)
        ->orderBy('players.id', 'asc')
        ->select('players.*')
        ->get();

            
        if(!empty($team->id)){
            return view('teams.show', compact('team', $team, 'teamOriginal', $teamOriginal));
        }
        else {
            return redirect()->route('overview')->with('error', 'Je hebt geen toegang tot dit team');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect('overview');

        return back()->with('succesTeam', 'Team '.$team->teamName.' is succesvol verwijderd');
    }

    public function addUserToTeam(Request $request)
    {
        $user = User::where('email', $request->email)
        ->where('role', '!=', 'user')->first();
        if(isset($user)){
            $team = Team::find($request->teamID);
            $team->users()->attach($user);
            return back()->with('succes', $user->email.' is toegevoegd');
        }
        else {

            return back()->with('error', 'Deze gebruiker is geen premium user, of bestaat niet.');
        }
    }

    public function addPlayerToTeam(Request $request)
    {
        $player = Player::find($request->playerID);
        $team = Team::find($request->teamID);
        $team->players()->attach($player);

        return back()->with('succes', $player->firstName.' is toegevoegd');
    }
}

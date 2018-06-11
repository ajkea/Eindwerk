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
        $teams = DB::table('teams')
            ->join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', '1')
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

        return back()->with('succesTeam', 'Je hebt '.$request->teamName.' succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $team = Team::find($team->id)
            ->join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', auth()->user()->id)
            ->where('teams.id', '=', $team->id)
            ->first();
            
        if(!empty($team->id)){
            return view('teams.show', compact('team', $team));
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
        $user = User::where('username', $request->username)->first();
        if(isset($user)){
            $team = Team::find($request->teamID);
            $team->users()->attach($user);
            return back()->with('succesTeam', $user->username.' is toegevoegd');
        }
        else {

            return back()->with('errorTeam', 'Deze gebruiker bestaat niet');
        }
    }
}

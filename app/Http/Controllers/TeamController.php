<?php

namespace App\Http\Controllers;

use App\UserTeam;
use App\Team;
use App\User;
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
        $teams = Team::all();

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
            'teamName' => 'string|required|unique:teams,teamName',
            'teamDescription' => 'string|required',
        ]);

        $team = Team::create([
            'teamName' => $request->teamName,
            'teamDescription' => $request->teamDescription,
        ]);

        $FKuserID = Auth::id();
        $FKteamID = Team::where('teamName',$request->teamName)->first();

        $userTeam = UserTeam::create([
            'FKuserID' => $FKuserID,
            'FKteamID' => $FKteamID->id,

        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $userTeams = UserTeam::find($team);
        return view('teams.show', compact('team', $team));
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
        //
    }

    public function addUserToTeam(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if(isset($user)){
            $team = Team::find($request->teamID);
            $team->users()->attach($user);
            return back()->with('succes', $user->username.' is toegevoegd');
        }
        else {

            return back()->with('error', 'Deze gebruiker bestaat niet');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\UserTeam;
use DB;

class OverviewController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')
            ->join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', '1')
            ->get();

        $players = DB::table('players')
            ->join('players_in_teams', 'players_in_teams.FKplayerID', '=', 'players.id')
            ->join('teams', 'teams.id', '=', 'players_in_teams.FKteamID')
            ->where('');

        return view('loggedin.overview', compact('teams', $teams));
    }

    public function deleteTeam(Request $request)
    {
        UserTeam::destroy($request->teamID);

        return redirect('overview')->with('succes', 'Team '.$request->teamname.' is succesvol verwijderd');
    }
}

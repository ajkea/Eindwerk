<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use DB;

class OverviewController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')
            ->join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', '1')
            ->get();

        return view('loggedin.overview', compact('teams', $teams));
    }
}

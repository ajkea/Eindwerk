<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\UserTeam;
use App\Player;
use App\Position;
use DB;

class OverviewController extends Controller
{
    public function index()
    {
        $teams = Team::join('user_teams', 'user_teams.FKteamID', '=', 'teams.id')
            ->where('user_teams.FKuserID', '=', auth()->user()->id)
            ->get();

        $players = Player::join('players_in_teams', 'players_in_teams.FKplayerID', '=', 'players.id')
            ->join('teams', 'teams.id', '=', 'players_in_teams.FKteamID')
            ->where('teams.teamName', '=', auth()->user()->firstName)
            ->select('players.*')
            ->get();

        $positions = Position::Where('positionName', '<>', 'ball' )->get();

        return view('loggedin.overview', compact('teams', $teams, 'players', $players, 'positions', $positions));
    }

    public function deleteTeam(Request $request)
    {
        UserTeam::destroy($request->teamID);

        return back()->with('succesTeam', 'Team '.$request->teamname.' is succesvol verwijderd');
    }

    public function deletePlayer(Request $request)
    {
        $player = Player::find($request->id);

        if(isset($player->FKmediaID))
        {
            $playerImage = Media::find($player->FKmediaID);
            $imagePath = "images/upload/" . $playerImage->source;
            File::delete($imagePath);
            $playerImage->delete();
            
        }
        Player::destroy($request->playerID);
        return back()->with('succesPlayer', 'Speler '.$request->firstName.' '.$request->lastName.' is succesvol verwijderd');
    
    }

    public function search(Request $request){
        if($request->ajax()){
            $output = "";
            $players = Player::where('firstName', '=', $request->search)->get();

            $output.='iets';

            return Response($output);
        }
    }
}

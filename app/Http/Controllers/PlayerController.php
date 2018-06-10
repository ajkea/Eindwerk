<?php

namespace App\Http\Controllers;

use App\Player;
use App\Position;
use App\Media;
use App\PlayersInTeam;
use App\UserTeam;
use App\Team;
use DB;
use File;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::where('teamName',auth()->user()->username)->first();
        return view('players.index', compact('team', $team));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('players.create', compact('positions', $positions));
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
            'firstName' => 'string|required|min:3',
            'lastName' => 'string|required|min:2',
            'birthDate' => 'date|required|before:-12 Years',
            'FKpositionID' => 'required|integer',
            'media' => 'file|mimes:jpeg,bmp,png,jpg',
        ]);


        if(isset($request->media)) {
            $FKmediaID = $this->uploadMedia($request->media, $request->firstName, $request->lastName);

            $player = Player::create([
                'firstName' => $request->firstName, 
                'lastName' => $request->lastName, 
                'birthDate' => $request->birthDate, 
                'description' => $request->description, 
                'FKpositionID' => $request->FKpositionID,
                'FKmediaID' => $FKmediaID,
                ]);
        }
        else {
            $player = Player::create([
                'firstName' => $request->firstName, 
                'lastName' => $request->lastName, 
                'birthDate' => $request->birthDate, 
                'description' => $request->description, 
                'FKpositionID' => $request->FKpositionID
            ]);
        }
        $defaultTeam = UserTeam::where('FKuserID', auth()->user()->id)->first();
        $player = DB::table('players')->latest()->first();

        PlayersInTeam::create([
            'FKplayerID' => $player->id,
            'FKteamID' => $defaultTeam->FKteamID,
        ]);
        return $player;
        return back()->with('succesPlayer', 'Je hebt '.$request->firstName.' '.$request->lastName.' succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $playerJson = $player->toJson();
        return view('players.show', compact('playerJson', $playerJson));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $positions = Position::all();
        return view('players.edit', compact('player', $player, 'positions', $positions));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        
        $request->validate([
            'firstName' => 'string|required|min:3',
            'lastName' => 'string|required|min:2',
            'birthDate' => 'date|required|before:-12 Years',
            'FKpositionID' => 'required|integer',
            'media' => 'file|mimes:jpeg,bmp,png,jpg',
        ]);


        if(isset($request->media)) {
            $FKmediaID = $this->uploadMedia($request->media, $request->firstName, $request->lastName);

            $player = Player::find($player->id);
            $player->firstName = $request->firstName;
            $player->lastName = $request->lastName;
            $player->birthDate = $request->birthDate;
            $player->description = $request->description;
            $player->FKpositionID = $request->FKpositionID;
            $player->FKmediaID = $FKmediaID;
            $player->save();
        }
        else {
            $player = Player::find($player->id);
            $player->firstName = $request->firstName;
            $player->lastName = $request->lastName;
            $player->birthDate = $request->birthDate;
            $player->description = $request->description;
            $player->FKpositionID = $request->FKpositionID;
            $player->save();
        }
        return back()->with('succesPlayer', 'De speler is succesvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Player $player)
    {
        return $player->id;
        if(isset($player->FKmediaID))
        {
            $playerImage = Media::find($player->FKmediaID);
            $imagePath = "images/upload/" . $playerImage->source;
            File::delete($imagePath);
            $playerImage->delete();
            
        }
        $player->delete();
        return back()->with('succesPlayer', 'De speler is verwijderd');
    }

    public function uploadMedia($media, $firstName, $lastName)
    {
        $FKmediaID = new Media();
        $extension = $media->getClientOriginalExtension();
        $filename = 'player-'.$firstName.'-'.str_replace(' ','-',$lastName).'-'.time().'.'.$extension;
        $altDescription = 'profile picture of player '.$firstName.' '.$lastName;
        $media->move('images/upload/', $filename);
        $media->source = $filename;

        $media = Media::create(['source' => $filename, 'alt' => $altDescription]);
        $media->save();
        $FKmediaID = Media::where('source',$filename)->first();
        return $FKmediaID->id;
    }

    public function deleteImage($mediaID)
    {
        $imageFile = Media::find($mediaID);
        $imagePath = "images/upload/" . $imageFile->source;
        File::delete($imagePath);
        $player = Player::where('FKmediaID', $mediaID)->update(['FKmediaID' => null]);
        Media::destroy($mediaID);
        return back()->with('succesPlayer', 'De afbeelding is verwijderd');
    }
}

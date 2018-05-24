<?php

namespace App\Http\Controllers;

use App\Player;
use App\Position;
use App\Media;
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
        $players = Player::all();
        return view('players.index', compact('players', $players));
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
            'birthDate' => 'date|required',
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

        return redirect('/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    public function uploadMedia($media, $firstName, $lastName)
    {
        $FKmediaID = new Media();
        $extension = $media->getClientOriginalExtension();
        $filename = 'player-'.$firstName.'-'.str_replace(' ','-',$lastName).time().'.'.$extension;
        $altDescription = 'profile picture of player '.$firstName.' '.$lastName;
        $media->move('images/upload/', $filename);
        $media->source = $filename;

        $media = Media::create(['source' => $filename, 'alt' => $altDescription]);
        $media->save();
        $FKmediaID = Media::where('source',$filename)->first();
        return $FKmediaID->id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = Coordinate::all();
        return $coordinates;
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
            'xCoordinate' => 'required|integer',
            'yCoordinate' => 'required|integer',
            'step' => 'required|integer',
            'FKplayersInTactic' => 'required|integer',
        ]);

        Coordinate::create($request->all());

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function show($coordinateID)
    {
        $coordinate = new Coordinate();
        $coordinate = showCoordinate($coordinateID);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function edit($coordinateID)
    {
        $coordinate = new Coordinate();
        $coordinate = showCoordinate($coordinateID);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinate $coordinate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinate $coordinate)
    {
        Coordinate::destroy($coordinate);
    }
}

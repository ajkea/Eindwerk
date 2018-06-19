<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/media', 'MediaController')->middleware('auth');
Route::resource('/players', 'PlayerController')->middleware('auth');
Route::resource('/positions', 'PositionController')->middleware('auth');
Route::resource('/teams', 'TeamController')->middleware('auth');
Route::resource('/users', 'UserController')->middleware('auth');
Route::resource('/tactics', 'TacticController')->middleware('auth');
Route::resource('/pit', 'PlayersInTacticController')->middleware('auth');
Route::resource('/coor', 'CoordinateController')->middleware('auth');

Route::post('/userteams/addUser', 'TeamController@addUserToTeam')->middleware('auth');
Route::post('/userteams/addPlayer', 'TeamController@addPlayerToTeam')->middleware('auth');
Route::post('tactics/addToTeam', 'TacticController@store')->middleware('auth');
Route::post('tactics/addPlayer', 'TacticController@addPlayer')->middleware('auth');
Route::post('tactics/addCoordinates', 'TacticController@addCoordinate')->middleware('auth');
Route::post('tactics/removeCoordinates', 'TacticController@removeCoordinate')->middleware('auth');
Route::post('tactics/editCoordinates', 'TacticController@EditCoordinate')->middleware('auth');
Route::post('tactics/deletePlayer', 'TacticController@deletePlayer')->middleware('auth');

Route::post('tactics/addOnCanvas', array('as' => 'changeStatus', 'uses' => 'TacticController@addCoordinate'));

Route::get('/overview', 'OverviewController@index')->middleware('auth')->name('overview');
Route::get('/overview/search', 'OverviewController@search')->middleware('auth');
Route::post('/teams/delete', 'OverviewController@deleteTeam')->middleware('auth');
Route::post('/players/delete', 'OverviewController@deletePlayer')->middleware('auth');
Route::post('/players/edit', 'PlayerController@editPlayer')->middleware('auth');
Route::get('/canvas', function () {
    return view('test.canvas');
});

Route::get('/players/{id}/deleteImage', 'PlayerController@deleteImage');

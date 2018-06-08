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
Route::post('tactics/addToTeam', 'TacticController@store')->middleware('auth');
Route::post('tactics/addPlayer', 'TacticController@addPlayer')->middleware('auth');
Route::post('tactics/addCoordinates', 'TacticController@addCoordinate')->middleware('auth');
Route::post('tactics/removeCoordinates', 'TacticController@removeCoordinate')->middleware('auth');

Route::post('tactics/addOnCanvas', array('as' => 'changeStatus', 'uses' => 'TacticController@addCoordinate'));

<<<<<<< HEAD
Route::get('/overview', 'OverviewController@index')->middleware('auth');

=======
Route::get('/canvas', function () {
    return view('test.canvas');
});
>>>>>>> b4d7bc05d5c60e7d0f31c7a9325b8c219a4e42eb


// Team toevoegen nodig? anders kans op toevoegen van random teams andere personen
// Route::post('/userteams/addTeam', 'TeamController@addTeamToUser')->middleware('auth');


Route::get('/players/{id}/deleteImage', 'PlayerController@deleteImage');

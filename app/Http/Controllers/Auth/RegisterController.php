<?php

namespace App\Http\Controllers\Auth;


use App\Media;
use App\Team;
use App\UserTeam;
use File;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/overview';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'media' => 'file|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $firstName = $data['firstName'];
        if(isset($data->media)) {
            $FKmediaID = $this->uploadMedia($data['media'], $firstName);

            $user = User::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'FKmediaID' => $FKmediaID,
            ]);
        }
        else {
            $user = User::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        $this->createDefaultTeam($data['firstName']);
        return $user;
    }

    public function uploadMedia($media, $name)
    {
        $FKmediaID = new Media();

        $extension = $media->getClientOriginalExtension();
        $filename = 'user-'.$name.'-'.time().'.'.$extension;
        $altDescription = 'profile picture of user '.$name;
        $media->move('images/upload/', $filename);
        $media->source = $filename;

        $media = Media::create(['source' => $filename, 'alt' => $altDescription]);
        $media->save();
        $FKmediaID = Media::where('source',$filename)->first();
        return $FKmediaID->id;
    }

    public function createDefaultTeam($firstName)
    {
        Team::create([
            'teamName' => $firstName,
            'teamDescription' => 'team with players created by '.$firstName,
        ]);

        $team = Team::where('teamName', $firstName)->first();
        $user = User::where('firstName', $firstName)->first();
        
        UserTeam::create([
            'FKteamID' => $team->id,
            'FKuserID' => $user->id,
        ]);
    }
}

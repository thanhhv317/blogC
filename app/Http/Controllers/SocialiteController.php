<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($socialite)
    {
        return Socialite::driver($socialite)->redirect();
    }

    /**
     * Obtain the user information from facebook, google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($socialite)
    {
        $user = Socialite::driver($socialite)->user();
 
        $authUser = $this->findOrCreateUser($user);
        
        Auth::login($authUser, true);
    
        return redirect()->route('admin.post');
    }
 
    private function findOrCreateUser($socialiteUser)
    {
        $authUser = User::where('provider_id', $socialiteUser->id)->first();
 
        if ($authUser) {
            return $authUser;
        }
 
        return User::create([
            'name' => $socialiteUser->name,
            'level' => 1,
            'password' => $socialiteUser->token,
            'email' => $socialiteUser->email,
            'provider' => $socialiteUser->id,
            'provider_id' => $socialiteUser->id,
        ]);
    }
}

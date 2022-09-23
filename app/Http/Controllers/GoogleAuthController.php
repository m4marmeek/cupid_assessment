<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

use App\Providers\RouteServiceProvider;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            // Retrive User from Google Response
            $user = Socialite::driver('google')->user();

            // Check existing user with same email
            $emailExist = User::where('email', $user->email)->first();
       
            // Check existing user with same google id
            $googleUser = User::where('google_id', $user->id)->first();
       
            if($googleUser || $emailExist){
       
                Auth::login($googleUser);
      
                return redirect()->intended(RouteServiceProvider::HOME);
       
            } else {
                $newUser = User::create([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make('password')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended(RouteServiceProvider::HOME);
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

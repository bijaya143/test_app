<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;
use Exception;

class FacebookController extends Controller
{
    //login using facebook
    // public function loginUsingFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function callbackFromFacebook(Request $request)
    // {
    //     try {
    //         //code...
    //         $user = Socialite::driver('facebook')->user();
    //         dd($user);
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    //updated facebook login
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('facebook')->user();
      
            $finduser = User::where('facebook_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/home');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    //'social_type'=> 'facebook',
                    'password' => encrypt('my-facebook')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

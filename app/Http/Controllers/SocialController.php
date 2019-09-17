<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SocialAuth;
class SocialController extends Controller
{
    public function auth($provider){
        
       return SocialAuth::authorize($provider);
    }
    public function auth_callback($provider){
        // get data from github
       // dd($provider);
        SocialAuth::login($provider, function($user,$details){
         //   dd($details);
            $user->email= $details->email;
            $user->name = $details->nickname;
            $user->user_type='seeker';
            $user->save();
        });
        return redirect('/user/profile');
    }
}

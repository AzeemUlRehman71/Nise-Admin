<?php

namespace App\Http\Controllers;

use App\Ads;
use App\CheckinCredits;
use App\FriendsCredits;
use App\setting;
use App\Sinch;
use App\User;
use App\VideoadCredits;
use Illuminate\Http\Request;

class SinchController extends Controller
{
    public function index(){
        $sinch = Sinch::where('id', '=', 1)->first();
        $user    = User::get();
        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();
        return view('users.sinch', compact('sinch', 'user', 'checkin', 'videoad', 'friends','setting'));
    }

    public function store(Request $request){
        $sinch = Sinch::where('id', '=', 1)->first();

        $sinch->environment           = $request->environment;
        $sinch->app_secret            = $request->app_secret;
        $sinch->app_key	              = $request->app_key;
        $sinch->user_id               = $request->user_id;
        $sinch->save();

        return back()->withStatus('Sinch update Successfully');
    }
}

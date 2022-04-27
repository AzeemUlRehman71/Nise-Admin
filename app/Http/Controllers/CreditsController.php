<?php

namespace App\Http\Controllers;

use App\CheckinCredits;
use App\FriendsCredits;
use App\VideoadCredits;
use Illuminate\Http\Request;
use App\User;

use App\setting;

class CreditsController extends Controller
{
    public function index(){

        $user    = User::get();

        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();
        return view('users.credits', compact('user',  'setting','checkin','videoad','friends'));
    }

    public function checkInCredits(Request $request){
        $this->validate($request, [
            'checkinStart' => 'required',
            'checkinEnd'   =>  'required'
        ]);
        $credits = CheckinCredits::where('id', '=', 1)->first();
        $credits->checkInStart = $request->checkinStart;
        $credits->checkInEnd = $request->checkinEnd;
        $credits->save();

        return back()->withStatus('CheckIn values saved Successfully');
    }

    public function videoadCredits(Request $request){
        $this->validate($request, [
            'videoadStart' => 'required',
            'videoadEnd'   =>  'required'
        ]);

        $credits = VideoadCredits::where('id', '=', 1)->first();
        $credits->videoAdStart = $request->videoadStart;
        $credits->videoAdEnd = $request->videoadEnd;
        $credits->save();

        return back()->withStatus('Video credit saved Successfully');
    }

    public function invitefriendsCredits(Request $request){
        $this->validate($request, [
            'invitefriendStart' => 'required',
            'invitefriendEnd'   =>  'required'
        ]);

        $credits = FriendsCredits::where('id', '=', 1)->first();
        $credits->inviteFriendsStart = $request->invitefriendStart;
        $credits->inviteFriendsEnd = $request->invitefriendEnd;
        $credits->save();

        return back()->withStatus('Friend Credit saved Successfully');
    }
}

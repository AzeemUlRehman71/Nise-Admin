<?php

namespace App\Http\Controllers;

use App\CheckinCredits;
use App\FriendsCredits;
use App\GoogleBillings;
use App\setting;
use App\User;
use App\VideoadCredits;
use Illuminate\Http\Request;

class GoogleBillingController extends Controller
{
    public function index(){
        $googleBilling = GoogleBillings::where('id', '=', 1)->first();
        $user    = User::get();
        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();
        return view('users.GoogleBilling', compact('googleBilling', 'user', 'checkin', 'videoad', 'friends','setting'));
    }

    public function store(Request $request){
        $googleBilling = GoogleBillings::where('id', '=', 1)->first();

        $googleBilling->license_key           = $request->license_key;
        $googleBilling->merchant_id           = $request->merchant_id;
        $googleBilling->product_id	          = $request->product_id;
        $googleBilling->save();

        return back()->withStatus('Google Billing update Successfully');
    }
}

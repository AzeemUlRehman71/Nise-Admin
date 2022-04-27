<?php

namespace App\Http\Controllers;

use App\CheckinCredits;
use App\FbAd;
use App\FriendsCredits;
use App\VideoadCredits;
use Illuminate\Http\Request;
use App\Ads;
use App\User;

use App\setting;
class AdsController extends Controller
{
    public function index(){
        $ads = Ads::where('id', '=', 1)->first();
        $user    = User::get();
        $setting = setting::get();
        $checkin = CheckinCredits::first();
        $videoad = VideoadCredits::first();
        $friends = FriendsCredits::first();
        $fbAds = FbAd::where('id', '=', 1)->first();
        return view('users.ads', compact('ads', 'user', 'checkin', 'videoad', 'friends','setting','fbAds'));
    }

    public function admob(Request $request){
        $admob = Ads::where('id', '=', 1)->first();

        $admob->app_id           = $request->admobAppId;
        $admob->banner_id        = $request->admobBannerAd;
        $admob->inersitial_id	 = $request->admobInterstitialAd;
        $admob->rewarded_id      = $request->admonRewardedAd;
        $admob->save();

        return back()->withStatus('Admob Ad update Successfully');
    }

    public function facebook(Request $request){
        $fbAds = FbAd::where('id', '=', 1)->first();
        $fbAds->fb_BannerAd            = $request->fb_BannerAd;
        $fbAds->fb_InterstitialAd	      = $request->fb_InterstitialAd;
        $fbAds->fb_RewardedAd          = $request->fb_RewardedAd;
        $fbAds->save();

        return back()->withStatus('Facebook Ad update Successfully');
    }
}

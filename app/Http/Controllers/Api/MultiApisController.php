<?php

namespace App\Http\Controllers\Api;

use App\Ads;
use App\FbAd;
use App\FriendsCredits;
use App\GoogleBillings;
use App\Http\Controllers\Controller;
use App\setting;
use App\Package;
use App\Sinch;
use App\VideoadCredits;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiApisController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function index(){

        $data['sinch'] = Sinch::first();
        $data['google_billing'] = GoogleBillings::first();
        $data['google_admob'] = Ads::first();
        $data['facebook_ad'] = FbAd::first();
        $data['remote_credits'] = setting::select('id','name','value')->get();
        $data['packages'] = Package::select('id','name','value')->get();
        $response =  self::HTTP_CREATED;

        return response()->json([
            'status' => 200,
            'pref_settings' => $data,
        ], $response);

    }




}

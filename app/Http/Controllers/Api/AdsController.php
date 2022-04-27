<?php

namespace App\Http\Controllers\Api;
use App\Ads;
use App\FbAd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AdsController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function index(Request $request){

        $data['admob'] = Ads::get();
        $data['fbAds'] = FbAd::get();
        $response =  self::HTTP_CREATED;
        return response()->json(['Ads' => $data],
            $response);

    }

}

<?php

namespace App\Http\Controllers\Api;

use App\FbAd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FbAdsController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function index(Request $request){

        $data = FbAd::get();
        $response =  self::HTTP_CREATED;
        return response()->json(['fdAds' => $data],
            $response);

    }
}

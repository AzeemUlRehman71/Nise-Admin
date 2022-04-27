<?php

namespace App\Http\Controllers\Api;
use App\CheckinCredits;
use App\FriendsCredits;
use App\setting;
use App\Http\Controllers\Controller;
use App\VideoadCredits;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SettingController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function index(){

        $data['remote_credits'] = setting::select('id','name','value')->get();
        $data['video_credits'] = VideoadCredits::get();
        $data['invite_friends_credits'] = FriendsCredits::get();
        $response =  self::HTTP_CREATED;

        return response()->json([
            'credits' => $data
        ], $response);

    }
}

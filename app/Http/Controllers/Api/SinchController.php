<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sinch;
use Symfony\Component\HttpFoundation\Response;
class SinchController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    
    public function index(){
        
        $data  = Sinch::first();
        $response =  self::HTTP_CREATED;

        return response()->json([
            'status' => 200, 
            'sinch' => $data,
        ], $response);

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\GoogleBillings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoogleBillingController extends Controller
{

    CONST HTTP_CREATED = Response::HTTP_CREATED;
    public function index(){

        $data  = GoogleBillings::first();
        $response =  self::HTTP_CREATED;

        return response()->json([
            'status' => 200,
            'googleBilling' => $data,
        ], $response);

    }
}

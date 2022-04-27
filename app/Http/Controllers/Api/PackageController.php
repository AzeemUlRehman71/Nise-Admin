<?php

namespace App\Http\Controllers\Api;

use App\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PackageController extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function index(){

        $response =  self::HTTP_CREATED;

        $data = Package::select('id','name','value')->get();
        
        return response()->json([ 'packages' => $data], $response);
 
    }
}

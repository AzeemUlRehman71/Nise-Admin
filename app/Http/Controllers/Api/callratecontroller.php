<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CallRateResource;
use Symfony\Component\HttpFoundation\Response;
use App\CallRate;

class callratecontroller extends Controller
{
    CONST HTTP_CREATED = Response::HTTP_CREATED;
    public function list(){

        $response =  self::HTTP_CREATED;
        $data =  CallRate::get();

        return response()->json([ 'callRates' => $data], $response);

     
    }

    public function update_flag(){


        $str = file_get_contents('http://127.0.0.1:8000/countries_flag.json');
        dd($str);
        $json = json_decode($str, true);
        
        $data =  CallRate::get();
        foreach($data as $dat){
            $image = strtolower($dat['iso']).'.svg';
            

            CallRate::where('id', $dat['id'])->update(array('flag_image' =>  $image));
          
        }
        dd($data);


    }
    public function dial_code($dialcode){

        $dial = CallRate::where('dialcode', $dialcode)->first();
        return new CallRateResource($dial);
    
    }
}

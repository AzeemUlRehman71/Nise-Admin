<?php

namespace App\Http\Controllers\API;

use App\CheckinCredits;
use App\User;
use App\Credits;
use App\ReferelCredits;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{

  CONST HTTP_OK = Response::HTTP_OK;
  CONST HTTP_CREATED = Response::HTTP_CREATED;
  CONST HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;
  CONST API_KEY = 'n3C2O5xANDn87HoMwYBSXM/yVz6pbQon6r34v20c=';

  public function login(Request $request){


    $credentials = [
        'phone' => $request->email,
        'password' => $request->password
    ];

    if( auth()->attempt($credentials) ){

      $user = Auth::user();

      $token['token'] = $this->get_user_token($user,"TestToken");

      $response = self::HTTP_OK;

      return $this->get_http_response( "success", $token, $response );

    } else {

      $error = "Unauthorized Access";

      $response = self::HTTP_UNAUTHORIZED;

      return $this->get_http_response( "Error", $error, $response );
    }

  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [

      'phone'       => 'required|min:20|numeric',
      'dial_code'   => 'required|min:5|numeric',

    ]);

    if ($validator->fails()) {

      return response()->json([ 'error'=> $validator->errors() ]);

    }
    $data = $request->all();
    $flag  = 0; 
 
    $user = User::select('phone','dial_code','referral_code','id')->where('phone', $data['phone'])->first();

  if(empty($user)){

    $referral_code = generateRandomString();

    $code = User::where('referral_code',$referral_code)->first();

    $data['referral_code'] =  empty($code) ? $referral_code : generateRandomString();

    $user = User::create($data);

    $credit_value  = CheckinCredits::first();

    if(isset($data['refer_code']) && !empty($data['refer_code'])){

      $refer_user = User::where('referral_code',$data['refer_code'])->first();

        if($refer_user){
            $credits = Credits::where('user_id',$refer_user['id'])->first();
            $credit_status = [
              'phone' => $user->phone,
              'credits' => $credit_value->checkInStart,
              'user_id' => $refer_user->id,
              'refer_code' =>$data['refer_code'],
              'refer_id' => $user->id,
              'status' => 0,

            ];
            $referal_status = ReferelCredits::create($credit_status);
        }

    }

    $user_credit = [
      'phone' => $user->phone,
      'credits' => $credit_value->checkInStart,
      'user_id' => $user->id,
    ];
    $credits = Credits::create($user_credit);
    $flag  = 1; 
  }else{

    $credits = Credits::where('user_id',$user['id'])->first();

  }


      unset( $user['created_at'] );
      unset( $user['updated_at'] );

    $accessToken = $user->createToken('authToken')->accessToken;

    $success['token'] = $accessToken;
    $success['status'] = 200;

    $user->credits = $credits->credits;

    $success['account'] =  $user;
    $success['flag'] =  $flag;

    $response =  self::HTTP_CREATED;

    return $this->get_http_response( true, $success, $response );

  }

  public function pending_credits(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'phone'       => 'required|min:20|numeric',
    ]);

    if ($validator->fails()) {

      return response()->json([ 'error'=> $validator->errors() ]);

    }
    $user = User::select('phone','dial_code','referral_code','id')->where('phone', $request->phone)->first();

    $pending_refrel = ReferelCredits::where(['user_id'=>$user['id'],'status'=>0])->get();

    $credits = 0;
    foreach($pending_refrel as $refral){
      $update_refer = ReferelCredits::find($refral['id']);
      $update_refer->status = 1;
      $update_refer->save();
      $credits +=  $refral['credits'];

    }
    $user['credits'] = $credits;
    $success['account'] =  $user;
    $success['status'] = 200;
    $response =  self::HTTP_CREATED;

    return response()->json(['remote_user' => $success], $response);

  }

  public function balance_update(Request $request){

    $validator = Validator::make($request->all(), [
      'phone'       => 'required|min:20|numeric',
      'credits'       => 'required|numeric',
    ]);

    if ($validator->fails()) {

      return response()->json([ 'error'=> $validator->errors() ]);

    }

    $user = User::select('phone','dial_code','referral_code','id')->where('phone', $request->phone)->first();

    if($user){
      $credits = Credits::where('user_id',$user['id'])->first();
      $credits->credits = $request->credits;
      $credits->save();
    }

    $user['credits'] =  $credits->credits;
    $success['account'] =  $user;
    $success['status'] = 200;
    $response =  self::HTTP_CREATED;
    return response()->json(['remote_user' => $success], $response);


  }

  public function get_user_details_info()
  {

    $user = Auth::user();

    $response =  self::HTTP_OK;

    return $user ? $this->get_http_response( "success", $user, $response )
                   : $this->get_http_response( "Unauthenticated user", $user, $response );

  }

  public function get_http_response( string $status = null, $data = null, $response ){

    return response()->json([


        'remote_user' => $data,

    ], $response);
  }

  public function get_user_token( $user, string $token_name = null ) {

     return $user->createToken($token_name)->accessToken;

  }

}

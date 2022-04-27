<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    CONST HTTP_CREATED = Response::HTTP_CREATED;

    public function handle($request, Closure $next)
    {

    $header_key = $request->header('Authorization');
    $api_key = 'n3C2O5xANDn87HoMwYBSXM/yVz6pbQon6r34v20c=';

        if( strcmp($api_key, $header_key ) ){
            return response()->json([
                'status' => false,
                'remote_user' => array(),
            ],   self::HTTP_CREATED);
        }
        return $next($request);
    }
}

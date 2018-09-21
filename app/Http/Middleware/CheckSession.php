<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;
use Closure;
use Session;
use GuzzleHttp\Client;
use Log;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        return $next($request);

        //letakkan kode kamu disini...
        if( empty(Session::get('name')) || empty(Session::get('username')) || empty(Session::get('api_token')) || empty(Session::get('user_subgroup_id')) ) {
            Session()->flush();

            return redirect()->guest('/');
        } else {

            // if( Session::get('client_ip') == $_SERVER['REMOTE_ADDR'] ) {

                $client = new \GuzzleHttp\Client();
                $form_post = $client->request('POST', config('constants.api_serverv').'token_check?api_token='.session()->get('api_token'), [
                    'json' => [
                        'name' => Session::get('name'),
                        'username' => Session::get('username')
                    ]
                ]);

                $var = json_decode($form_post->getBody()->getContents(), true);

                if($var['success'] == true) {
                    // Session::put('session_counter', Session::get('session_counter')+1);

                    return $next($request);
                } else {
                    Session()->flush();
                    return redirect()->guest('/');
                }

            // } else {
            //     Session()->flush();

            //     return redirect()->guest('/');
            // }

        }

        // if( empty(Session::get('name')) || empty(Session::get('username')) || empty(Session::get('api_token')) ) {
        //     $request->session()->flush();

        //     return redirect('/');
        // } else {
        //     $client = new \GuzzleHttp\Client();
        //     $form_post = $client->request('POST', config('constants.api_server').'token_check?api_token='.session()->get('api_token'), [
        //         'json' => [
        //             'name' => Session::get('name'),
        //             'username' => Session::get('username')
        //         ]
        //     ]);

        //     $var = json_decode($form_post->getBody()->getContents(), true);

        //     if($var['success'] == true) {
        //         return $next($request);
        //     } else {
        //         return redirect('/');
        //     }

        //     //return $next($request);
        // }

    }

    public function terminate($request, $response)
    {

        if( $request->getMethod() == 'POST' ) {
            Log::info('Log start ===========================');
            Log::info('URL: '.$request->fullUrl());
            Log::info('Method: '.$request->getMethod());
            Log::info('IP Address: '.$request->getClientIp());
            Log::info('Status Code: '.$response->getStatusCode());
            Log::info('Request Data ===========================');

            $req = $request->all();

            foreach( $req as $key => $value ) {
                Log::info('Request data: '. $key .' -> '. json_encode($value) );
            }

            Log::info('Response Data ===========================');

            $resp = $response->getOriginalContent();

            if( is_string($resp) && is_array(json_decode($resp, true)) && (json_last_error() == JSON_ERROR_NONE) ) {
                $resp = json_decode($resp, true);
            }

            if( count($resp) == 0 ) {
                $res[] = 'Response is null';
            } else {
                /*foreach( $resp as $key => $value ) {
                    Log::info('Response data: '. $key .' -> ' . json_encode($value) );
                }*/
            }

            Log::info('Log end ===========================');

        }
    }
}

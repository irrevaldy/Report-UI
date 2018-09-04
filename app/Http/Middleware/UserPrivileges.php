<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Support\Facades\DB;
use view;

class UserPrivileges
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public $attributes;

    public function handle($request, Closure $next)
    {
        //letakkan kode kamu disini...
        if( empty(Session::get('name')) || empty(Session::get('username')) || empty(Session::get('token')) || empty(Session::get('user_subgroup_id')) ) {
            Session()->flush();

            return redirect()->guest('/');
        } else {
                
            $username = Session::get('username');

            $client = new \GuzzleHttp\Client();
            $form_post = $client->request('GET', config('constants.api_serverv').'user_privilege/'.$username.'?api_token='.session()->get('token'));
            $var = json_decode($form_post->getBody()->getContents(), true);
            $data = $var['result'];

            $privilege_list = array();

            foreach ($data as $key => $value) {
                # code...
                array_push($privilege_list, $value['privilege_code']);
            }

            view()->share('priv', $privilege_list);

            return $next($request);
           
        }
        
    }
}

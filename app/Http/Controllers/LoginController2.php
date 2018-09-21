<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class LoginController extends Controller
{
   	public function __construct(){
        
    }

    public function login_page(Request $request) {
    	return view('auth/login');
    }

    public function login_proccess(Request $request) {

    	$client = new \GuzzleHttp\Client();
		
		//$var = json_decode($form_post->getBody()->getContents());

		//$result = $var->result;
		
		//return json_encode($result);

    	$result['res'] = $request->all();
    	$result['token'] = sha1(time());

    	$username = $request->input('user');
        $username = strtolower($username);
        $password = $request->input('pass');
        $password = strtolower($password);
        
        $old_password = hash('sha256', $password);
    	$new_password = hash('sha256', $username.$password);

    	$form_post = $client->request('POST', config('constants.api_serverv').'login', [
    		'json' => [
    			'username' => $username,
    			'old_password' => $old_password,
                'new_password' => $new_password
    		]
		]);

        $var = json_decode($form_post->getBody()->getContents(), true);

        // $username_list          = array("adly", "fadhli", "valdy", "liem", "gea_lah", "service_prov");
        // $name["adly"]           = "adly";
        // $name["fadhli"]         = "Fadhli";
        // $name["valdy"]          = "Valdy";
        // $name["liem"]           = "Liem";
        // $name["gea_lah"]        = "Pak Boss Gea";
        // $name["service_prov"]   = "Service Provider";

        if($var['success'] == true) {
            Session::put('token', $var['data']['api_token']);
            Session::put('user_subgroup_id', $var['data']['user_subgroup_id']);
            Session::put('username', $username);
            Session::put('name', $var['data']['name']);

            $var['success']         = true;
            $var['message']         = 'Login success, '.$var['data']['name'].' !';
            // $var['data']['name']    = $name[$username];

            return $var;
        } else{
            return $var;
        }
        // if( in_array($username, $username_list) ) {

        //     Session::put('username', $username);
        //     Session::put('name', $name[$username]);

        //     $var['success']         = true;
        //     $var['message']         = 'Login success, '.$name[$username].' !';
        //     $var['data']['name']    = $name[$username];

        //     return $var;
        // } else {
        //     return $var;
        // }
        
    }

    public function logout_proccess(Request $request) {

        $client = new \GuzzleHttp\Client();
        $username = Session::get('username');

        // $form_post = $client->request('POST', config('constants.api_serverv').'logout', [
        //     'json' => [
        //         'username' => $username
        //     ]
        // ]);

        // $var = json_decode($form_post->getBody()->getContents(), true);

        $var['success'] = true;

        if($var['success'] == true) {
            $request->session()->flush();

            return redirect('/');
        }

    }
}

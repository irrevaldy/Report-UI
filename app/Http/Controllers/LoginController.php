<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class LoginController extends Controller
{
   	public function __construct()
    {

    }

    public function login_page(Request $request)
    {
    	return view('auth/login');
    }

    public function login_proccess(Request $request)
    {
    	$client = new \GuzzleHttp\Client();

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

        if($var['success'] == true)
        {
            Session::put('token', $var['data']['api_token']);
            Session::put('user_subgroup_id', $var['data']['user_subgroup_id']);
            Session::put('username', $username);
            Session::put('name', $var['data']['name']);
            Session::put('user_id', $var['data']['user_id']);
            Session::put('dashboard', $var['dashboard'][0]);
            Session::put('total_dashboard', count($var['dashboard']));

            $vari['success']         = true;
            $vari['message']         = 'Login success, '.$var['data']['name'].' !';
            $vari['dashboard'] = $var['dashboard'];
            $vari['total_dashboard'] = count($vari['dashboard']);
            $vari['data'] = $var['data'];

            return $vari;
        }
        else
        {
            return $var;
        }
    }

    public function logout_proccess(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $username = Session::get('username');

        $var['success'] = true;

        if($var['success'] == true)
        {
            $request->session()->flush();

            return redirect('/');
        }
    }
}

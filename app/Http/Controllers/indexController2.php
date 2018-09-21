<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class indexController extends Controller
{
   	public function __construct(){
       
    }

    public function index(Request $request) {
    	
    	$client = new \GuzzleHttp\Client();
        $form_post = $client->request('GET', config('constants.api_server').'home_data?api_token='.session()->get('api_token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['data_total_profile'] = $var['data_total_profile'];
        $data['data_last_activity'] = $var['data_last_activity'];

    	return view('home')->with('data', $data);;
    }
}

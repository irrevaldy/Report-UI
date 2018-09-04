<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class monitoringController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request) {
    	$client = new \GuzzleHttp\Client();

    	$form_post = $client->request('GET', config('constants.api_server').'/mon_data');
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['mon_data'] = $var['result'];

        // return $data;

    	return view('monitoring')->with('data', $data);
    }

    public function getMonitoringData(Request $request) {

    	$client = new \GuzzleHttp\Client();

    	$form_post = $client->request('GET', config('constants.api_server').'/mon_data');
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['mon_data'] = $var['result'];

        return $data;

    }

    public function getMonitoringData2(Request $request) {

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_server').'/mon_data/B012');
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['mon_data'] = $var['result'];

        return $data;

    }

    public function applyConfigTrxTotal(Request $request) {

       $client = new \GuzzleHttp\Client();
        $form_post = $client->request('POST', config('constants.api_server').'apply_config_trx_total?api_token='.session()->get('api_token').'&username='.session()->get('username'), [
                'json' => [
                    'trx_' => $request->input('trx')
                ]
            ]);
        
        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;

    }

    public function getTrxTotalData(Request $request) {

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_server').'/update_trx_total_data');
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data = $var['result'];

        return $data;

    }
}

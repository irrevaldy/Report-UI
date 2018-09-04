<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class FiltertypeController extends Controller
{
    public function __construct(){
        
    }

     public function index(Request $request) {
        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['filter_type_data'] = $var['result'];

        return view('filter_type_setup')->with('data', $data);
    }

    public function getFilterTypeData(Request $request, $id_filter_type) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/'.$id_filter_type.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertFilterTypeData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'filter_type_data_insert?api_token='.session()->get('token'),
            [
                "json" => [
                    "filterTypeName_"  => $request->input('filterTypeName')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function updateFilterTypeData(Request $request) {
        
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'filter_type_data_update?api_token='.session()->get('token'),
            [
                "json" => [
                    "filter_type_id_"   => $request->input('filter_type_id'),
                    "filterTypeName_"  => $request->input('filterTypeName')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function deleteFilterTypeData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'filter_type_data_delete?api_token='.session()->get('token'),
            [
                "json" => [
                    "filter_type_id_" => $request->input('filter_type_id')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

}

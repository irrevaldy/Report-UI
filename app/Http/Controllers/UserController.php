<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class UserController extends Controller
{
   	public function __construct(){
       
    }

    public function index(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'user_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['user_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['group_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['filter_type_data'] = $var['result'];

        return view('user_setup')->with('data', $data);
    }

    public function getUserData(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'user_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data = $var['result'];

        return $data;
    }

    public function getUserFilterTypeData(Request $request, $id_user) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'user_filter_type_data/'.$id_user.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getFilterValueOption(Request $request, $filter_type) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'filter_value_option/'.$filter_type.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertUserData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'user_data_insert?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "username_"             => $request->input('username'),
                    "name_"                 => $request->input('name'),
                    "password_"             => $request->input('password'),
                    "groupId_"              => $request->input('groupId'),
                    "subgroupId_"           => $request->input('subgroupId'),
                    "description_"          => $request->input('description'),
                    "filter_type_id_"       => $request->input('filter_type_id'),
                    "filter_type_value_"    => $request->input('filter_type_value')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function updateUserData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'user_data_update?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "user_id_"              => $request->input('user_id'),
                    "username_"             => $request->input('username'),
                    "name_"                 => $request->input('name'),
                    "password_"             => $request->input('password'),
                    "groupId_"              => $request->input('groupId'),
                    "subgroupId_"           => $request->input('subgroupId'),
                    "description_"          => $request->input('description'),
                    "userActive_"           => $request->input('userActive'),
                    "filter_type_id_"       => $request->input('filter_type_id'),
                    "filter_type_value_"    => $request->input('filter_type_value')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function deleteUserData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'user_data_delete?api_token='.session()->get('token'),
            [
                "json" => [
                    "user_id_"      => $request->input('user_id')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }
}

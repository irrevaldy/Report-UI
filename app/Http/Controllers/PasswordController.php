<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class PasswordController extends Controller
{
    public function __construct(){
        
    }

    public function index(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        // $form_post = $client->request('GET', config('constants.api_serverv').'group_data/all?api_token='.session()->get('token'));
        // $var = json_decode($form_post->getBody()->getContents(), true);
        // $data['group_data'] = $var['result'];
        
        // $form_post = $client->request('GET', config('constants.api_serverv').'package_data/all?api_token='.session()->get('token'));
        // $var = json_decode($form_post->getBody()->getContents(), true);
        // $data['package_data'] = $var['result'];
        
        // $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/all?api_token='.session()->get('token'));
        // $var = json_decode($form_post->getBody()->getContents(), true);
        // $data['filter_type_data'] = $var['result'];

        // return view('group_setup')->with('data', $data);
        return view('change_password');
    }

    public function ChangePasswordData(Request $request) {
        $client = new \GuzzleHttp\Client();

        $username       = Session::get('username');
        $input_old_pass = $request->input('old_password');
        $input_new_pass = $request->input('new_password');
        
        $old_password = strtolower($input_old_pass);
        $old_password = hash('sha256', $old_password);

        $new_password = strtolower($input_new_pass);
        $new_password = hash('sha256', $username.$new_password);        


        $form_post = $client->request('POST', config('constants.api_serverv').'change_password_data?api_token='.session()->get('token'),
            [
                "json" => [
                    "username"            => $username,
                    "old_password"        => $old_password,
                    "new_password"        => $new_password
                ]
            ]
        );


        $var = json_decode($form_post->getBody()->getContents(), true);
        // $result = $var['result'];

        return $var;
    }

}

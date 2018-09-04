<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class PackageController extends Controller
{
    public function __construct(){
        
    }

     public function index(Request $request) {
        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'package_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['package_data'] = $var['result'];

        $form_post = $client->request('GET', config('constants.api_serverv').'privilege_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['privilege_data'] = $var['result'];

        return view('package_setup')->with('data', $data);
    }

    public function getPackageData(Request $request, $id_package) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'package_data/'.$id_package.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getTranPackagePrivilegeData(Request $request, $id_package) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'tran_host_package_privilege_data/'.$id_package.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertPackageData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'package_data_insert?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "packageName_"  => $request->input('packageName'),
                    "description_"  => $request->input('description'),
                    "privilege_"    => $request->input('privilege')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function updatePackageData(Request $request) {
        
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'package_data_update?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "package_id_"   => $request->input('package_id'),
                    "packageName_"  => $request->input('packageName'),
                    "description_"  => $request->input('description'),
                    "privilege_"    => $request->input('privilege')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function deletePackageData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'package_data_delete?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "package_id_" => $request->input('package_id')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

}

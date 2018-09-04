<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class GroupController extends Controller
{
    public function __construct(){
        
    }

     public function index(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['group_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'package_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['package_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['filter_type_data'] = $var['result'];

        return view('group_setup')->with('data', $data);
    }


    public function getGroupData(Request $request, $id_group) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_data/'.$id_group.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getSubgroupPerGroupData(Request $request, $id_group) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'subgroup_data/group/'.$id_group.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getGroupPrivilegeData(Request $request, $id_group) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_privilege_data/'.$id_group.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getGroupFilterTypeData(Request $request, $id_group) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_filter_type_data/'.$id_group.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertGroupData(Request $request) {
        
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'group_data_insert?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "groupName_"            => $request->input('groupName'),
                    "packageId_"            => $request->input('packageId'),
                    "description_"          => $request->input('description'),
                    "filter_type_id_"       => $request->input('filter_type_id'),
                    "filter_type_value_"    => $request->input('filter_type_value')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function updateGroupData(Request $request) {
        
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'group_data_update?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "group_id_"             => $request->input('group_id'),
                    "groupName_"            => $request->input('groupName'),
                    "packageId_"            => $request->input('packageId'),
                    "description_"          => $request->input('description'),
                    "groupActive_"          => $request->input('groupActive'),
                    "filter_type_id_"       => $request->input('filter_type_id'),
                    "filter_type_value_"    => $request->input('filter_type_value')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function deleteGroupData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'group_data_delete?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "group_id_" => $request->input('group_id')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

}

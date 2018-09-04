<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class SubgroupController extends Controller
{
   	public function __construct(){
       
    }

    public function index(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'subgroup_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['subgroup_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'group_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['group_data'] = $var['result'];
        
        $form_post = $client->request('GET', config('constants.api_serverv').'privilege_data/all?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $data['privilege_data'] = $var['result'];

        return view('subgroup_setup')->with('data', $data);
    }


    public function getSubgroupData(Request $request, $id_subgroup) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'subgroup_data/'.$id_subgroup.'?api_token='.session()->get('token'));
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

    public function getTranSubgroupPrivilegeData(Request $request, $id_subgroup) {
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('GET', config('constants.api_serverv').'tran_subgroup_privilege_data/'.$id_subgroup.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertSubgroupData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'subgroup_data_insert?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "subgroupName_" => $request->input('subgroupName'),
                    "groupId_"      => $request->input('groupId'),
                    "description_"  => $request->input('description'),
                    "privilege_"    => $request->input('privilege')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function updateSubgroupData(Request $request) {
        
        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'subgroup_data_update?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "subgroup_id_"  => $request->input('subgroup_id'),
                    "subgroupName_" => $request->input('subgroupName'),
                    "groupId_"      => $request->input('groupId'),
                    "description_"  => $request->input('description'),
                    "privilege_"    => $request->input('privilege')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }

    public function deleteSubgroupData(Request $request) {

        $client = new \GuzzleHttp\Client();
        
        $form_post = $client->request('POST', config('constants.api_serverv').'subgroup_data_delete?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "subgroup_id_" => $request->input('subgroup_id')
                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);
        
        return $var;
    }
}

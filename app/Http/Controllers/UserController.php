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

    public function getFilterTypeOption(Request $request) {
        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'filter_type_data/all?api_token='.session()->get('token'));
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

    public function getFilterValueOptionAugmented(Request $request)
    {
        //return $request->all();

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('POST', config('constants.api_serverv').'filter_value_option_augmented?api_token='.session()->get('token'),
        [
            "json" => [
                "chosen_acquirer"       => $request->input('chosen_acquirer'),
                "chosen_corporate"    => $request->input('chosen_corporate'),
                "chosen_merchant"    => $request->input('chosen_merchant'),
                "chosen_branch"    => $request->input('chosen_branch'),
                "chosen_store"    => $request->input('chosen_store'),
                "filter_type" => $request->input('filter_type')
            ]
        ]
      );
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getFilterValueOptionSelected(Request $request, $filter_type, $user_id) {
        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'filter_value_option_selected/'.$filter_type.'/'.$user_id.'?api_token='.session()->get('token'));
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function getFilterValueOptionSelectedAugmented(Request $request)
    {
        //return $request->all();

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('POST', config('constants.api_serverv').'filter_value_option_selected_augmented?api_token='.session()->get('token'),
        [
            "json" => [
                "chosen_acquirer"       => $request->input('chosen_acquirer'),
                "chosen_corporate"    => $request->input('chosen_corporate'),
                "chosen_merchant"    => $request->input('chosen_merchant'),
                "chosen_branch"    => $request->input('chosen_branch'),
                "chosen_store"    => $request->input('chosen_store'),
                "filter_type" => $request->input('filter_type'),
                "user_id" => $request->input('user_id'),
            ]
        ]
      );
        $var = json_decode($form_post->getBody()->getContents(), true);
        $result = $var['result'];

        return $result;
    }

    public function insertUserData(Request $request) {
        //return $request->all();

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('POST', config('constants.api_serverv').'user_data_insert?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "username_"             => $request->input('new_username'),
                    "name_"                 => $request->input('new_name'),
                    "password_"             => $request->input('new_password'),
                    "groupId_"              => $request->input('new_groupId'),
                    "subgroupId_"           => $request->input('new_subgroupId'),
                    "description_"          => $request->input('new_description'),
                    "filter_acquirer_list_"       => $request->input('filter_acquirer_list'),
                    "filter_corporate_list_"    => $request->input('filter_corporate_list'),
                    "filter_merchant_list_"    => $request->input('filter_merchant_list'),
                    "filter_branch_list_"    => $request->input('filter_branch_list'),
                    "filter_store_list_"    => $request->input('filter_store_list')

                ]
            ]
        );

        $var = json_decode($form_post->getBody()->getContents(), true);

        return $var;
    }

    public function updateUserData(Request $request) {
        //return $request->all();

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('POST', config('constants.api_serverv').'user_data_update?api_token='.session()->get('token').'&username='.session()->get('username'),
            [
                "json" => [
                    "user_id_"              => $request->input('edit_user_id'),
                    "username_"             => $request->input('edit_username'),
                    "name_"                 => $request->input('edit_name'),
                    "password_"             => $request->input('edit_password'),
                    "groupId_"              => $request->input('edit_groupId'),
                    "subgroupId_"           => $request->input('edit_subgroupId'),
                    "description_"          => $request->input('edit_description'),
                    "userActive_"           => $request->input('edit_userActive'),
                    "filter_acquirer_list_"       => $request->input('edit_filter_acquirer_list'),
                    "filter_corporate_list_"    => $request->input('edit_filter_corporate_list'),
                    "filter_merchant_list_"    => $request->input('edit_filter_merchant_list'),
                    "filter_branch_list_"    => $request->input('edit_filter_branch_list'),
                    "filter_store_list_"    => $request->input('edit_filter_store_list')
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

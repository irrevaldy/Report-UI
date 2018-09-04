<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class DashmerchantController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $form_post = $client->request('GET', config('constants.api_serverv').'merchant_get_data');

      $result = json_decode($form_post->getBody(), true);

      return view('dashboard_merchant')->with([
          'total_branch' => $result['total_branch'],
          'total_store' => $result['total_store'],
          'total_terminal' => $result['total_terminal']
      ]);
    }

    public function GetMonthlyBranchTransactionTop5(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $form_post = $client->request('GET', config('constants.api_serverv').'/monthly_branchtop');

    	$var = json_decode($form_post->getBody()->getContents());

      return $var;
    }

    public function GetMonthlyBranchTransactionLow5(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $form_post = $client->request('GET', config('constants.api_serverv').'/monthly_branchlow');

      $var = json_decode($form_post->getBody()->getContents());

      return $var;
    }

    public function GetMonthlyStoreTransactionTop5(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $form_post = $client->request('GET', config('constants.api_serverv').'/monthly_storetop');

      $var = json_decode($form_post->getBody()->getContents());

      return $var;
    }

    public function GetMonthlyStoreTransactionLow5(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $form_post = $client->request('GET', config('constants.api_serverv').'/monthly_storelow');

      $var = json_decode($form_post->getBody()->getContents());

      return $var;
    }
}

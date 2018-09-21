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
        return view('dashboard_merchant');
    }

    public function GetTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'transaction_volume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }

    public function GetTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'transaction_count/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }



    public function GetDataDashboardMerchant(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'data_dashboard_merchant/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }

    public function GetTop5AcquirerTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5acq_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5acq_trx_volume'];

    }

    public function GetTop5AcquirerTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5acq_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5acq_trx_count'];

    }

    public function GetTop5BranchTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5bra_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5bra_trx_volume'];

    }

    public function GetTop5BranchTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5bra_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5bra_trx_count'];

    }

    public function GetTop5StoreTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5sto_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5sto_trx_volume'];

    }

    public function GetTop5StoreTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5sto_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5sto_trx_count'];

    }

    public function GetTop5CardTypeTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5ctp_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ctp_trx_volume'];

    }

    public function GetTop5CardTypeTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5ctp_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ctp_trx_count'];

    }

    public function GetTop5TransactionTypeTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5ttp_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ttp_trx_volume'];

    }

    public function GetTop5TransactionTypeTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'top5ttp_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ttp_trx_count'];

    }


}

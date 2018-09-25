<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class DashcorporateController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
        return view('dashboard_corporate');
    }

    public function GetDataDashboardCorporate(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/data_dashboard_corporate/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }

    public function GetTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/transaction_volume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }

    public function GetTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/transaction_count/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be;

    }

    public function GetTop5AcquirerTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5acq_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5acq_trx_volume'];

    }

    public function GetTop5AcquirerTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5acq_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5acq_trx_count'];

    }

    public function GetTop5MerchantTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5mer_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5mer_trx_volume'];

    }

    public function GetTop5MerchantTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5mer_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5mer_trx_count'];

    }

    public function GetTop5CardTypeTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5ctp_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ctp_trx_volume'];

    }

    public function GetTop5CardTypeTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5ctp_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ctp_trx_count'];

    }

    public function GetTop5TransactionTypeTransactionVolume(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5ttp_trxvolume/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ttp_trx_volume'];

    }

    public function GetTop5TransactionTypeTransactionCount(Request $request)
    {
      $client = new \GuzzleHttp\Client();

      $user_id = Session::get('user_id');

      $form_post = $client->request('GET', config('constants.api_serverv').'corporate/top5ttp_trxcount/'.$user_id);

      //$var = json_decode($form_post->getBody()->getContents());

      $from_be = json_decode($form_post->getBody(), true);

      return $from_be['top5ttp_trx_count'];

    }


}

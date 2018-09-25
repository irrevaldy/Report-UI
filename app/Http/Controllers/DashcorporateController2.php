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

        $client = new \GuzzleHttp\Client();

        $user_id = Session::get('user_id');

        $form_post = $client->request('GET', config('constants.api_serverv').'data_dashboard_corporate/'.$user_id);

        $from_be = json_decode($form_post->getBody(), true);

        // $from_be['last_month'] = "August"; 
        // $from_be['total_amount'] = "1241345240";
        // $from_be['total_trx'] = "21567";
        // $from_be['total_trx_success'] = "21066";
        // $from_be['total_trx_failed'] = "501";

        return view('dashboard_corporate')->with([
            // 'total_acquirer'      => $from_be['total_acquirer'],
            // 'total_corporate'     => $from_be['total_corporate'],
            'total_merchant'      => $from_be['total_merchant'],
            'total_branch'        => $from_be['total_branch'],
            'total_store'         => $from_be['total_store'],
            'total_terminal'      => $from_be['total_terminal'],
            'terminal_active'     => $from_be['terminal_active'],
            'terminal_inactive'   => $from_be['terminal_inactive'],
            'total_active_trx'    => $from_be['total_active_trx'],
            'total_trx_volume'    => $from_be['total_trx_volume'],
            'total_trx_count'     => $from_be['total_trx_count'],
            'total_trx_success'   => $from_be['total_trx_success'],
            'total_trx_failed'    => $from_be['total_trx_failed'],
            'offus_trxcount'      => $from_be['offus_trxcount'],
            'offus_trxvolume'     => $from_be['offus_trxvolume'],
            'onus_trxcount'       => $from_be['onus_trxcount'],
            'onus_trxvolume'      => $from_be['onus_trxvolume'],
            //'chart_trx_volume'    => $from_be['chart_trx_volume'],
            //'chart_trx_count'     => $from_be['chart_trx_count'],
            'top5acq_trx_volume'  => $from_be['top5acq_trx_volume'],
            'top5acq_trx_count'   => $from_be['top5acq_trx_count'],
            'top5mer_trx_volume'  => $from_be['top5mer_trx_volume'],
            'top5mer_trx_count'   => $from_be['top5mer_trx_count'],
            'top5ctp_trx_volume'  => $from_be['top5ctp_trx_volume'],
            'top5ctp_trx_count'   => $from_be['top5ctp_trx_count'],
            'top5ttp_trx_volume'  => $from_be['top5ttp_trx_volume'],
            'top5ttp_trx_count'   => $from_be['top5ttp_trx_count']
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

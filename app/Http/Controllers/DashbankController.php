<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class DashbankController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request) {

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'bank_get_data');

        $from_be = json_decode($form_post->getBody(), true);

        return view('dashboard_bank')->with([
            'last_month' => $from_be['last_month'],
            'total_amount' => $from_be['total_amount'],
            'total_trx' => $from_be['total_trx'],
            'total_trx_success' => $from_be['total_trx_success'],
            'total_trx_failed' => $from_be['total_trx_failed'],
            'top5high_amount' => $from_be['top5high_amount'],
            'top5low_amount' => $from_be['top5low_amount'],
            'total_trx_cardtype' => $from_be['total_trx_cardtype'],
            'total_trx_type' => $from_be['total_trx_type']
        ]);
    }

    public function index_copy(Request $request) {

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'bank_get_data');

        $from_be = json_decode($form_post->getBody(), true);

        return view('dashboard_bank_copy')->with([
            'last_month' => $from_be['last_month'],
            'total_amount' => $from_be['total_amount'],
            'total_trx' => $from_be['total_trx'],
            'total_trx_success' => $from_be['total_trx_success'],
            'total_trx_failed' => $from_be['total_trx_failed'],
            'top5high_amount' => $from_be['top5high_amount'],
            'top5low_amount' => $from_be['top5low_amount'],
            'total_trx_cardtype' => $from_be['total_trx_cardtype'],
            'total_trx_type' => $from_be['total_trx_type']
        ]);
    }
}

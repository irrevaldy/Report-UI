<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class DashprovController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request) {

        $client = new \GuzzleHttp\Client();

        $form_post = $client->request('GET', config('constants.api_serverv').'provider_get_data');

        $from_be = json_decode($form_post->getBody(), true);

        return view('dashboard_provider')->with([
            'last_day' => $from_be['last_day'],
            'top5high_amount_bank' => $from_be['top5high_amount_bank'],
            'top5low_amount_bank' => $from_be['top5low_amount_bank'],
            'top5high_amount_merchant' => $from_be['top5high_amount_merchant'],
            'top5low_amount_merchant' => $from_be['top5low_amount_merchant']
        ]);
    }
}

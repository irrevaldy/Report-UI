<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class SearchController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
        return view('search_transaction');
    }

    public function getDataSearchTransaction(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      $username = $request->session()->get('username');
      $store_code = $request->input('store_code');
      $branch_code = $request->input('branch_code');
      $host = $request->input('host');
      $transaction_type = $request->input('transaction_type');
      $prepaid_card_number = $request->input('prepaid_card_number');
      $approval_code = $request->input('approval_code');
      $mid = $request->input('mid');
      $tid = $request->input('tid');
      $transaction_date = $request->input('transaction_date');

    	$form_post = $client->request('POST', config('constants.api_serverv').'search_transaction', [
    		'json' => [
          'username' => $username,
    			'store_code' => $store_code,
    			'branch_code' => $branch_code,
          'host' => $host,
          'transaction_type' => $transaction_type,
          'prepaid_card_number' => $prepaid_card_number,
          'approval_code' => $approval_code,
          'mid' => $mid,
          'tid' => $tid,
          'transaction_date' => $transaction_date
    		]
    	]);
    	$var = json_decode($form_post->getBody()->getContents());

    	//return $var;

      if($var->success == true)
      {
    		// Session::put('id', $var->data->Id);
        $this->attrib = $var->result;

    		//return view('search_transaction')->with(['main_menu' => $this->main_menu, 'sub_menu' => $this->sub_menu, 'attrib' => $this->attrib]);
        //return redirect()->action('SearchController@index', ['attrib' => $this->attrib]);
        //return redirect()->action('HomeController@index');
        return $this->attrib;
    	}
    	else{
    		return Redirect::back()->withInput()->withErrors($var->message);
    	}
    }
}

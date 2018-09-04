<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class GlobalController extends Controller
{
  public function GetBranchData(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $form_post = $client->request('GET', config('constants.api_serverv').'branch_data1', [
      'json' => [
        'username' => Session::get('username')
      ]
    ]);

    $var = json_decode($form_post->getBody()->getContents());

    if($var->success == true)
    {
      $this->attrib = $var->result;

      return $this->attrib;
    }
    else
    {
      return Redirect::back()->withInput()->withErrors($var->message);
    }
  }

  public function GetMerchantData(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $form_post = $client->request('GET', config('constants.api_serverv').'merchant_data1');

    $var = json_decode($form_post->getBody()->getContents());

    if($var->success == true)
    {
      $this->attrib = $var->result;

      return $this->attrib;
    }
    else
    {
      return Redirect::back()->withInput()->withErrors($var->message);
    }
  }

  public function GetHostData(Request $request)
  {
    $client = new \GuzzleHttp\Client();

    $form_post = $client->request('GET', config('constants.api_serverv').'host_data1', [
      'json' => [
        'username' => Session::get('username')
      ]
    ]);

		$var = json_decode($form_post->getBody()->getContents());

    if($var->success == true)
    {
      $this->attrib = $var->result;

      return $this->attrib;
    }
    else
    {
      return Redirect::back()->withInput()->withErrors($var->message);
    }
  }
}

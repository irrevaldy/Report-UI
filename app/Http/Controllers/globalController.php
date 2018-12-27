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

  public function GetBankData(Request $request)
  {
    $client = new \GuzzleHttp\Client();

    $form_post = $client->request('GET', config('constants.api_serverv').'host_data', [
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

  public function GetBranchDataFiltered(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $form_post = $client->request('POST', config('constants.api_serverv').'branch_data_filtered', [
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

  public function GetMerchantDataFiltered(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $form_post = $client->request('POST', config('constants.api_serverv').'merchant_data_filtered', [
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

  public function GetHostDataFiltered(Request $request)
  {
    $client = new \GuzzleHttp\Client();

    $form_post = $client->request('POST', config('constants.api_serverv').'host_data_filtered', [
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

  public function GetLogo(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $form_post = $client->request('POST', config('constants.api_serverv').'get_logo', [
      'json' => [
        'username' => Session::get('username')
      ]
    ]);

    $from_be = json_decode($form_post->getBody(), true);

    return $from_be;
  }
}

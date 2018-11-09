<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;
use ZIPARCHIVE;

class TerminalLocationController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
      return view('terminal_location');
    }

    public function GetTerminalLocationData(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      $form_post = $client->request('GET', config('constants.api_serverv').'get_terminal_location');

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

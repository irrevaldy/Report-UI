<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class ReportmerchantController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
      return view('report_merchant');
    }


}

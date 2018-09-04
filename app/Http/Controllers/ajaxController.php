<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;

class ajaxController extends Controller
{
   	public function __construct(){
        
    }

    public function dummy(Request $request) {
    	return 'success';
    }

    

}

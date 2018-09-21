<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;
use ZIPARCHIVE;

class DownloadDetailReportProviderController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
      return view('download_detail_report_provider');
    }

    public function GetListReport(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      $username = $request->session()->get('username');

      $form_post = $client->request('POST', config('constants.api_serverv').'list_detail_report', [
        'json' => [
          'username' => $username
        ]
      ]);
      $var = json_decode($form_post->getBody()->getContents());

      //return $var;

      if($var->success == true)
      {
        // Session::put('id', $var->data->Id);
        $this->attrib = $var->result;

        return $this->attrib;

        //return redirect()->action('HomeController@index');
        //return $username;
      }
      else{
        return Redirect::back()->withInput()->withErrors($var->message);
      }

    }

    public function FilterReportTable(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      $branch = $request->input('branch_code');
      $range = $request->input('range');
      $date = $request->input('detailDate');
      $username = $request->session()->get('username');
      //$merchant = $request->session()->get('merch_id');

      $form_post = $client->request('POST', config('constants.api_serverv').'list_detail_report_filtered', [
        'json' => [
          'branch' => $branch,
          'range' => $range,
          'date' => $date,
          'username' => $username
        ]
      ]);
      $var = json_decode($form_post->getBody()->getContents());
      //return $var;

      if($var->success == true)
      {
        // Session::put('id', $var->data->Id);
        $this->attrib = $var->result;

        return $this->attrib;

        //return redirect()->action('HomeController@index');
        //return $username;
      }
      else{
        return Redirect::back()->withInput()->withErrors($var->message);
      }

    }

    public function ZipListReport(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      //$checkedArr = array();
      $tmpFile = tempnam(sys_get_temp_dir(), 'reports_');
      $checkedArr = $request->input('checkedArray');
      $checkedA= json_decode($checkedArr);
      $username = $request->session()->get('username');
      $filename = $username.'-AllReport.zip';

      $form_post = $client->request('POST', config('constants.api_serverv').'zip_list_report', [
        'sink' => $tmpFile,
        'json' => [
          'checkedA' => $checkedA
        ]
      ]);
      return response()->download(
          $tmpFile,
          $filename,
          [
              'Content-Type' => 'application/zip'
          ]
      )->deleteFileAfterSend(true);
    }


}

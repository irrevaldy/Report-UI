<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Session;
use ZIPARCHIVE;

class DownloadDetailReportAcquirerController extends Controller
{
   	public function __construct(){

    }

    public function index(Request $request)
    {
      return view('download_detail_report_acquirer');
    }

    public function GetListReport(Request $request)
    {
      $this->main_menu = $request->get('main_menu');
      $this->sub_menu = $request->get('sub_menu');

      $client = new \GuzzleHttp\Client();
      $username = $request->session()->get('username');

      $form_post = $client->request('POST', config('constants.api_serverv').'list_detail_report_acquirer', [
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

    public function ZipListReport(Request $request)
    {
      $this->main_menu = $request->get('main_menu');
      $this->sub_menu = $request->get('sub_menu');

      //$client = new \GuzzleHttp\Client();
      //$checkedArr = array();
      $checkedArr = $request->input('checkedArray');
      $checkedA= json_decode($checkedArr);

      $dir = "C://generate/";

      $zipname = 'AllReport.zip';
      $zip = new ZipArchive;

      if (file_exists($zipname)) {
          $zip->open($zipname, ZipArchive::OVERWRITE );
      } else {
          $zip->open($zipname, ZIPARCHIVE::CREATE );
      }

      foreach($checkedA as $file)
      {
        //echo $file;
        //echo "<br>";
        $zip->addFile($dir.$file, $file);
      }

      $zip->close();

      header('Content-Type: application/zip');
      header('Content-disposition: attachment; filename='.$zipname);
      header('Content-Length: ' . filesize($zipname));
      header("Pragma: no-cache");
      header("Expires: 0");
      readfile($zipname);

      //return view('list_report')->with(['main_menu' => $this->main_menu, 'sub_menu' => $this->sub_menu]);

    }

    public function FilterReportTable(Request $request)
    {
      $this->main_menu = $request->get('main_menu');
      $this->sub_menu = $request->get('sub_menu');

      $client = new \GuzzleHttp\Client();
      $merchant = $request->input('merchant_code');
      $range = $request->input('range');
      $date = $request->input('detailDate');
      $username = $request->session()->get('username');
      //$merchant = $request->session()->get('merch_id');

      $form_post = $client->request('POST', config('constants.api_serverv').'list_detail_report_filtered_acquirer', [
        'json' => [
          'merchant' => $merchant,
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


}

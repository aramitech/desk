<?php

namespace App\Http\Controllers;

use App\Models\SendSmses;
use App\Models\BookmarkersCompany;
use App\Models\CategoryTypes;
use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Models\AuditLog;

use App\Classes\SendSms;
class SendSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Authdelete = Auth::user()->deletestatus;
        // $Authedit = Auth::user()->editstatus;
       // return Auth::user();
      // return   $category_type_id = CategoryTypes::where('categorytypes_id','1')->get();

        $sendsmsis = SendSmses::all();
        return view('sendsms.index', compact('sendsmsis'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
    
        $user = new SendSmses();
       // $user->company_id = $request->company_id['company_id'];
        $user->message = $request->message;
        $user->company_id = 1;
     //   $mm= "https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky";
     
        $user->save();
        $username = 'bclb&password';
        $password = 'B@910CLB';
        $contact_arr=[];
        $recipient='0712516957';
        $contactsarray=explode(",",$recipient);
        $message= $request->message;

          $uri = $request->path();
          https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky
      

          $username = 'bclb';
          $password = 'B@910CLB';
          // $endpoint = "https://www.123.com/";
          $endpoint = "https://www.123.com/";

          $curl = curl_init($endpoint); 
          $parameters = array( 
              'username'=>$username, 
              'password'=>$password, 
              'source'=>'', 
              'destination'=>$recipient, 
              'message'=>$message
              ); 
          $payload = json_encode($parameters); 
          curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
         // curl_setopt($ch, CURLOPT_URL, $url);
         /// curl_setopt($curl, CURLOPT_NTTPNEADER, array('Content-Type: application/json', 'Accept: application/json')); 
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
          $response = curl_exec($curl); 
          curl_close($curl); 
          return $response;



      // $api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$destination.'&message='.$message;  
      // $smsGatewayUrl = "https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky";  
      // $smsgatewaydata = $smsGatewayUrl.$api_params;
      // $url = $smsgatewaydata;

      // $ch = curl_init();                       // initialize CURL
      // curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
      // curl_setopt($ch, CURLOPT_URL, $url);
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // $output = curl_exec($ch);
      // curl_close($ch);                         // Close CURL

      // // Use file get contents when CURL is not installed on server.
      // if(!$output){
      //    $output =  file_get_contents($smsgatewaydata);  
      // }
          // foreach($contactsarray as $recipient){        
        //   return  $smsobject=new SendSms($username,$password);   
        //   //  $textstatus=$smsobject->sendMessage($recipient,$message);        
        // }

        return back()->with('success','Added succesfully');
    }

   
    public function CURLsendsms($destination, $message_body){   

      // $api_params = '?apikey='.$apikey.'&sender='.$sender.'&to='.$destination.'&message='.$message;  
      $smsGatewayUrl = "http://mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=".$message_body."&destination=".$destination."&source=Mobisky";  
      $smsgatewaydata = $smsGatewayUrl;
      $url = $smsgatewaydata;

      $ch = curl_init();                       // initialize CURL
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);
      $output = curl_exec($ch);
      curl_close($ch);                         // Close CURL
      \Log::info($output);
      // Use file get contents when CURL is not installed on server.
      if(!$output){
         $output =  file_get_contents($smsgatewaydata);  
      }

  }




}



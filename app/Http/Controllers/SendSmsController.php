<?php

namespace App\Http\Controllers;

use App\Models\SendSmses;
use App\Models\BookmarkersCompany;
use App\Models\CategoryTypes;
use Illuminate\Http\Request;

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
        $phone='0712516957';
        $contactsarray=explode(",",$phone);
        $message= $request->message;

          $uri = $request->path();
          https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky
      
      $api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$destination.'&message='.$message;  
      $smsGatewayUrl = "https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky";  
      $smsgatewaydata = $smsGatewayUrl.$api_params;
      $url = $smsgatewaydata;

      $ch = curl_init();                       // initialize CURL
      curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $output = curl_exec($ch);
      curl_close($ch);                         // Close CURL

      // Use file get contents when CURL is not installed on server.
      if(!$output){
         $output =  file_get_contents($smsgatewaydata);  
      }
          // foreach($contactsarray as $phone){        
        //   return  $smsobject=new SendSms($username,$password);   
        //   //  $textstatus=$smsobject->sendMessage($phone,$message);        
        // }

        return back()->with('success','Added succesfully');
    }

   
    function CURLsendsms($destination, $message_body){   

      $api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$destination.'&message='.$message;  
      $smsGatewayUrl = "https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky";  
      $smsgatewaydata = $smsGatewayUrl.$api_params;
      $url = $smsgatewaydata;

      $ch = curl_init();                       // initialize CURL
      curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $output = curl_exec($ch);
      curl_close($ch);                         // Close CURL

      // Use file get contents when CURL is not installed on server.
      if(!$output){
         $output =  file_get_contents($smsgatewaydata);  
      }

  }




}



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

    public function sendsmstocontact()
    {
        $sendsmsis = SendSmses::all();
        return view('sendsms.sendsmstocontact', compact('sendsmsis'));
    }

    public function sendbulksms()
    {
        $sendsmsis = SendSmses::all();
        return view('sendsms.sendbulksms', compact('sendsmsis'));
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

        $destination=$request->company_id['contact'];
        $sms = new SendSms;
        $sms->sendMessage($destination, ''.$user->message);

        return back()->with('success','Added succesfully');
    }

   

    public function sendsmstocontact_add(Request $request)
    {
 
    
        $user = new SendSmses();
       // $user->company_id = $request->company_id['company_id'];
        $user->message = $request->message;
        $user->company_id = 1;
        
     //   $mm= "https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky";
     
        $user->save();

        $destination=$request->contact;
        $sms = new SendSms;
        $sms->sendMessage($destination, ''.$user->message);

        return back()->with('success','Added succesfully');
    }
    

    public function send_bulksms(Request $request)
    {
 
    
        $user = new SendSmses();
       // $user->company_id = $request->company_id['company_id'];
        $user->message = $request->message;
        $user->company_id = 1;
          
        $user->save();
        $contact_arr=[];
        $contacts = '0712516957';
        // $contacts = $request->contact;
        return back()->with('success','Added succesfully');
        foreach($contacts as $phone)
        {
            
            $message = $request->message;
            $phone='0712516957';
            $smsobject=new SendSms($username,$password);
    
            $textstatus=$smsobject->sendMessage($phone,$message);
            array_push($contact_arr,$textstatus);
            
        }
        return $textstatus;



       $destination=$request->company_id['contact'];
        $sms = new SendSms;
        $sms->sendMessage($destination, ''.$user->message);

        return back()->with('success','Added succesfully');
    }
    
    


}



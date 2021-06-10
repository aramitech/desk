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
        
     
        $user->save();

        $destination=$request->contact;
        $sms = new SendSms;
        $sms->sendMessage($destination, ''.$user->message);

        return back()->with('success','Added succesfully');
    }
    

    public function send_bulksms(Request $request)
    {
 
       $compay_contacts=  BookmarkersCompany::all()->pluck('contact');
        $user = new SendSmses();
       // $user->company_id = $request->company_id['company_id'];
        $user->message = $request->message;
        $user->company_id = 1;
          
        $user->save();
        $contact_arr=[];
        $contacts = $compay_contacts;
        // $contacts = $request->contact;
       // return back()->with('success','Added succesfully');
        foreach($contacts as $phone)
        {
            
            $message = $request->message;
             $phone=  $compay_contacts['phone'];
         //   $phone=  '0712516957';
          $destination= $compay_contacts;
          $sms = new SendSms;
          $sms->sendMessage($destination, ''.$user->message);
        }


        return back()->with('success','Added succesfully');
    }
    
    


}



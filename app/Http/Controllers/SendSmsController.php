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
        $phone='0702142629';
        $contactsarray=explode(",",$phone);
        $message= $request->message;
        foreach($contactsarray as $phone){
           
            $smsobject=new SendSms($username,$password);
       
          //  $textstatus=$smsobject->sendMessage($phone,$message);
           

        }

        return back()->with('success','Added succesfully');
    }

   
}

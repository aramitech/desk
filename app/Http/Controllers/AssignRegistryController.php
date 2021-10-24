<?php

namespace App\Http\Controllers;

use App\Models\FileRegistry;
use App\Models\AssignRegistry;
use App\Models\Registry;

use EloquentBuilder;
use App\Exports\TaskingExports;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Auth;
class AssignRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 

    public function index()
    {
        //
        $assignregistries = AssignRegistry::with('assignregistry_registry')->get();
        return view('registry.assign', compact('assignregistries'));
    }
    
    public function reportstasking()
    {
        //
        $assignregistries = AssignRegistry::with('assignregistry_registry')->get();
        return view('vuexy.registryreports.assign', compact('assignregistries'));
    }
    public function reportstaskinguseradmin()
    {
        //
        $assignregistries = AssignRegistry::with('assignregistry_registry')->get();
        return view('vuexy.registryreportsuseradmin.assign', compact('assignregistries'));
    }
    
   public function registryassignadmin()
    {
        //
        $assignregistries = AssignRegistry::with('assignregistry_registry')->get();
        return view('vuexy.registry.assign', compact('assignregistries'));
    }


    public function indexuser()
    {
        $id= Auth::guard('web')->user()->id;
        $assignregistries =AssignRegistry::with('assignregistry_registry')->where('id', $id)->latest()->take(2)->get();
        return view('registryuser.assign', compact('assignregistries'));
    }

               //export excel
               public function exportExceltasking()
               {
                   return new TaskingExports(request()->all());
               }
                 

    //return Company Name
    public function folio_names()
    {
        {
            $class_names = FileRegistry::with('FileRegistryRegistry')->get();
            return $class_names;
        }
    }

    //return Company Name
    public function class_names_assign()
    {
        {
            $class_names = AssignRegistry::with('assignregistry_registry')->get();
            return $class_names;
        }
    }
    
    //return Company Name
    public function pref_names_assign()
    {
        {
            $class_names = FileRegistry::with('assignregistry_registry')->get();
            return $class_names;
        }
    }

    

    public function taskingpdf()
    {
          $taskings = AssignRegistry::All();
        //  $registries = EloquentBuilder::to(Registry::with('accountscompany'), request()->all())->get();
    
     
        $pdf = PDF::loadView('vuexy.registryreports.taskingpdf',compact('taskings'));
        return $pdf->download('registries.pdf');
    } 



    public function store(Request $request)
    {
        
        $request->validate([
            'issued_to' => 'required',
            'duration_issued' => 'required|integer',
        ]);
		if(Auth::guard('admin')->check())
        {     
            $id= Auth::guard('admin')->user()->admin_id;
            $email= Auth::guard('admin')->user()->email;  
            $category= 'Admin'; 
        }
    elseif(Auth::guard('web')->check())
    {
        //$userLog->id = Auth::user()->id;
        $id= Auth::guard('web')->user()->id;
        $email= Auth::guard('web')->user()->email;  
        $category= 'User'; 
    }



        $user = new AssignRegistry();   
            $user->file_registry_id = $request->file_registry_id['file_registry_id'];
        $user->registry_id = '3';
        $user->id = $id;
           $user->date_issued = $request->date_issued;
        $user->issued_to = $request->issued_to;
        $user->duration_issued = $request->duration_issued;
           $user->reason_you_issue = $request->reason_you_issue;        
        $user->save();
        return back()->with('success','Added succesfully');
    }
    



    public function update(Request $request)
    {

        
		if(Auth::guard('admin')->check())
        {     
            $id= Auth::guard('admin')->user()->admin_id;
            $email= Auth::guard('admin')->user()->email;  
            $category= 'Admin'; 
        }
    elseif(Auth::guard('web')->check())
    {
        //$userLog->id = Auth::user()->id;
        $id= Auth::guard('web')->user()->id;
        $email= Auth::guard('web')->user()->email;  
        $category= 'User'; 
    }



        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
        ]);
        $user = Company::findOrFail($request->assign_registry_id);
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
           $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
           $user->paybillno = $request->paybillno;
          return $user->status = $request->status;
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
       
        $user = AssignRegistry::findOrFail($request->id['assign_registry_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
    
    public function death(Request $request, $id )
    {
        $id;  $user = BookmarkersCompany::findOrFail( $id );
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }  

    public function sendmail(Request $request){
        // $data["email"]=$request->get("email");
        // $data["client_name"]=$request->get("client_name");
        // $data["subject"]=$request->get("subject");
       
          $data["email"]=$request->email;
        $data["client_name"]='Simon';
        $data["subject"]=$request->subject;
        $currentTime = Carbon::now()->format('d M Y');
  
        $taskings = AssignRegistry::All();
        //  $registries = EloquentBuilder::to(Registry::with('accountscompany'), request()->all())->get();
    
     
        $currentTime = Carbon::now()->format('d M Y');
       // $pdf = PDF::loadView('vuexy.accounts.acc', $data);
        $pdf = PDF::loadView('vuexy.registryreports.taskingpdf', $data,compact('currentTime','taskings'));
  
        try{
        
           
        //    Mail::send('vuexy.mail.test', $data, function($message) use ($data, $subject) {
        //       $email='aramitechnology@gmail.com';
        //       $message->to($email)->subject($subject);
        //   });
            Mail::send('vuexy.mail.test', $data, function($message) use ($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "Registry.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";
  
        }else{
  
           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return back()->with('success','Sent succesfully');
        return response()->json(compact('this'));
  }
  
    

}

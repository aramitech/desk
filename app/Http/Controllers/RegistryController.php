<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\BookmarkersCompany;
use App\Models\Registry;
use Maatwebsite\Excel\Facades\Excel;
use EloquentBuilder;
use App\Exports\RegistryExports;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Auth;
class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }




    public function index()
    {
        //
        $registries = Registry::All();
        return view('registry.index', compact('registries'));
    }
    

    public function registryadmin()
    {
        //
        $registries = Registry::All();
        return view('vuexy.registry.index', compact('registries'));
    }



    public function indexuser()
    {
        $id= Auth::guard('web')->user()->id;
        $registries = Registry::where('id', $id)->latest()->take(2)->get();
        return view('registryuser.index', compact('registries'));
    }
    
    public function reportsregistry()
    {
   
      $registries = Registry::All();
        //$registries = EloquentBuilder::to(Registry::(''), request()->all())->get();
        return view('vuexy.registryreports.registry', compact('registries'));

    }
    
    
    public function registryuseradmin()
    {
   
      $registries = Registry::All();
        //$registries = EloquentBuilder::to(Registry::(''), request()->all())->get();
        return view('vuexy.registryreportsuseradmin.registry', compact('registries'));

    }

      //export excel
      public function exportExcelregistry()
      {
          return new RegistryExports(request()->all());
      }
      
      public function registrypdf()
      {
            $registries = Registry::All();
          //  $registries = EloquentBuilder::to(Registry::with('accountscompany'), request()->all())->get();
      
       
          $pdf = PDF::loadView('vuexy.registryreports.registrypdf',compact('registries'));
          return $pdf->download('RRegistries.pdf');
      } 

 
    public function store(Request $request)
    {
        
        $request->validate([
            'class' => 'required',
            'file_name' => 'required',
            'volume' => 'required',
        
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
   
        $user = new Registry();
        $user->pref='BCLB';
        $user->pref = $user->pref;
        $user->class = $request->class;
        $user->subject = $request->subject;
        $user->serial_number = $request->serial_number;
        $user->file_name = $request->file_name; 
        $user->volume = $request->volume; 
        $user->allpref= $user->pref.'  '.$request->class.'/'.$request->file_name.'/VOL.'.$request->volume;
        $user->id = $id;  

        $user->save();
        return back()->with('success','Added succesfully');
    }
    
    public function updateregistry(Request $request)
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
            'class' => 'required',
            'subject' => 'required',
            'serial_number' => 'required',
        
        ]);
        $user = Registry::findOrFail($request->registry_id);
        $user->pref='BCLB';
        $user->pref = $user->pref;
        $user->class = $request->class;
        $user->subject = $request->subject;
        $user->serial_number = $request->serial_number;
        $user->file_name = $request->file_name; 
        $user->volume = $request->volume; 
        $user->allpref= $user->pref.'/'.$request->serial_number.'/'.$request->subject.'/VOL.'.$request->volume;
        $user->id = $id;    
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
       
        $user = Registry::findOrFail($request->id['registry_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
        public function destroybookmarkerscompany(Request $request)
    {
        $user = BookmarkersCompany::findOrFail($request->id['company_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
        public function destroypublicgamingcompany(Request $request)
    {
        $user = PublicGamingCompany::findOrFail($request->id['publicgaming_company_id']);
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
  
        $registries = Registry::All();  
  
        $currentTime = Carbon::now()->format('d M Y');
       // $pdf = PDF::loadView('vuexy.accounts.acc', $data);
        $pdf = PDF::loadView('vuexy.registryreports.registrypdf', $data,compact('currentTime','registries'));
  
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

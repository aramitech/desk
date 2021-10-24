<?php

namespace App\Http\Controllers;

use App\Models\FileRegistry;
use App\Models\BookmarkersCompany;
use App\Models\Registry;

use EloquentBuilder;
use App\Exports\FilingExports;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Auth;
class FilingRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 

    public function index()
    {
        //
        $registries = FileRegistry::with('FileRegistryRegistry')->get();
        return view('registry.filing', compact('registries'));
    }
    
    public function registryfilingdmin()
    {
        //
        $registries = FileRegistry::with('FileRegistryRegistry')->get();
        return view('vuexy.registry.filing', compact('registries'));
    }


    public function indexuser()
    {
        $id= Auth::guard('web')->user()->id;
        $registries =FileRegistry::with('FileRegistryRegistry')->where('id', $id)->latest()->take(2)->get();
        return view('registryuser.filing', compact('registries'));
    }



    //return Company Name
    public function class_names()
    {
        {
            $class_names = Registry::pluck('class');
            return $class_names;
        }
    }

       //return Company Name
       public function class_names_filing()
       {
           {
               $class_names = Registry::All();
               return $class_names;
          }
       }
           //export excel
           public function exportExcelfiling()
           {
               return new FilingExports(request()->all());
           }
             
       
           public function filingpdf()
           {
                 $registries = FileRegistry::All();
               //  $registries = EloquentBuilder::to(Registry::with('accountscompany'), request()->all())->get();
           
            
               $pdf = PDF::loadView('vuexy.registryreports.filingpdf',compact('registries'));
               return $pdf->download('registries.pdf');
           } 


    public function reportsfiling()
    {
   
      $filings = FileRegistry::All();
        //$registries = EloquentBuilder::to(Registry::(''), request()->all())->get();
        return view('vuexy.registryreports.filing', compact('filings'));

    }
    
    public function reportsfilinguseradmin()
    {
   
      $filings = FileRegistry::All();
        //$registries = EloquentBuilder::to(Registry::(''), request()->all())->get();
        return view('vuexy.registryreportsuseradmin.filing', compact('filings'));

    }


    public function store(Request $request)
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
  // return $request;
  
        $user = new FileRegistry();   
        $user->registry_id = $request->file_registry_ref['registry_id'];
        $user->id = $id;
        $initials='BCLB';
        
        $user->file_registry_ref= $initials.'/'.$request->file_registry_ref['serial_number'].'/'.$request->file_registry_ref['subject'].'/VOL.'.$request->file_registry_ref['volume'].'/'.$request->folio;
        $user->folio = $request->folio;
        $user->subject_heading = $request->subject_heading;
        $user->registry_date = $request->registry_date;
        $user->status = $request->status;        
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
        $user = FileRegistry::findOrFail($request->file_registry_id);
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        return   $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
           $user->paybillno = $request->paybillno;
          return $user->status = $request->status;
        $user->save();
        return back()->with('success','Updated succesfully');
    }


  
    public function updateBookmarkersCompany(Request $request)
    {
        
        $user = FileRegistry::findOrFail($request->file_registry_id);
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->branch = $request->branch;
        $user->category_type_id = $request->category_type_id['categorytypes_id'];   
        $user->paybillno = $request->paybillno;
        $user->status = $request->status;
        $user->save();
        return back()->with('success','Updated succesfully');
    }


    public function destroy(Request $request)
    {
       
        $user = FileRegistry::findOrFail($request->id['file_registry_id']);
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
  
        $registries = FileRegistry::All();
        //  $registries = EloquentBuilder::to(Registry::with('accountscompany'), request()->all())->get();
    
   
  
        $currentTime = Carbon::now()->format('d M Y');
       // $pdf = PDF::loadView('vuexy.accounts.acc', $data);
        $pdf = PDF::loadView('vuexy.registryreports.filingpdf', $data,compact('currentTime','registries'));
  
        try{
        
           
        //    Mail::send('vuexy.mail.test', $data, function($message) use ($data, $subject) {
        //       $email='aramitechnology@gmail.com';
        //       $message->to($email)->subject($subject);
        //   });
            Mail::send('vuexy.mail.test', $data, function($message) use ($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "FileRegistry.pdf");
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

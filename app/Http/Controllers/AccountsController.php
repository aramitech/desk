<?php

namespace App\Http\Controllers;

use App\Models\BookMarkers;
use App\Models\BookmarkersCompany;
use App\Models\Accounts;
use App\Models\Shops;
use Illuminate\Http\Request;
use Auth;
use App\Models\AuditLog;
use App\Imports\BookMarkersImport;
use Maatwebsite\Excel\Facades\Excel;
use EloquentBuilder;
use App\Exports\AccountsExports;
use PDF;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
class AccountsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
        return view('accounts.ac', compact('accounts'));

    }
    
    //export excel
    public function exportExcel()
    {
        return new AccountsExports(request()->all());
    }

    
  
    public function accountsregistryuseradmin()
    {
   
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
        return view('vuexy.registryaccounts.index', compact('accounts'));

    }

    public function accountsusers()
    {
   $id= Auth::guard('web')->user()->id;
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany')->where('id', $id), request()->all())->latest()->take(2)->get();
        return view('accounts.user', compact('accounts'));

    }
    


    public function accountsedit()
    {
   
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
        return view('vuexy.accounts.accounts_edit', compact('accounts'));

    }

    public function bookmarkersdata()
    {
        if(request()->get('inactive') == 'on')
        {
            $bookmarkers = BookmarkersCompany::where('category_type_id','1')->with('bookmarkerscompany')->get()->groupBy('company_id');
            $constraints = '';
            if(request()->get('from')){
                $bookmarkers = BookmarkersCompany::where('category_type_id','1')->with(['bookmarkerscompany' => function($query){
                    $query->whereDate('return_for_the_period_of', "<", \Carbon\Carbon::create(request()->get('from')));
                }])->get()->groupBy('company_id');
            }
            // if(request()->get('to')){
            //     $bookmarkers = BookmarkersCompany::whereHas('bookmarkerscompany', function($query){
            //         $query->whereDate('return_for_the_period_to', ">", request()->get('to'));
            //     })->with('bookmarkerscompany')->get()->groupBy('company_id');
            // }

            // $bookmarkers = BookMarkers::with('bookmarkerscompany')->orderByDesc('bookmarker_id')->get()->groupBy('company_id');
        
            
            // whereHas('bookmarkerscompany', function($query){
            //     $query->select('bookmarker_id','company_id','shop_id','licensee_name','license_no','return_for_the_period_of',
            //                 'return_for_the_period_to','branch','date','bets_no','deposits','total_sales','total_payout',
            //                 'wht','winloss','ggr','ggrtax','id');
            // })->
            $bookmarkersdata = [];
            // $companies = [];
            foreach($bookmarkers as $bookMarker)
        
            {
                // array_push($companies,$bookMarker[0]->company_id);
                if($bookMarker[0]->bookmarkerscompany->count() > 0)
                {
                    array_push($bookmarkersdata,$bookMarker[0]->bookmarkerscompany->first());
                }
                else{
                    $arr = ["bookmarker_id"=>null,"company_id"=>$bookMarker[0]->company_id,"licensee_name"=>$bookMarker[0]->trading_name,"license_no"=>$bookMarker[0]->companlicense_noy_id,"return_for_the_period_of"=>null,"return_for_the_period_to"=>null,"branch"=>null,"date"=>null,"bets_no"=>"0","deposits"=>"0","total_sales"=>0,"total_payout"=>0,"wht"=>0,"winloss"=>null,"ggr"=>null,"ggrtax"=>null,"id"=>null];
                    array_push($bookmarkersdata,$arr);
                }
            }
            return $bookmarkersdata;
        }
        else {
            $bookmarkers = BookMarkers::with('bookmarkerscompany')->get();
            return $bookmarkers;
        }
      
     
    }

    public function bookmarker_shop_name()
    {
        // $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
        $shops = Shops::with('Shopcompany')->where('company_id',request()->get('company_id'))->where('category_type_id',1)->get();
       
        return $shops;
    }


    
    
    public function addbookmarkers()
    {
        $bookmarkers = BookMarkers::all();
        return view('bookmarkers.addbookmarkers', compact('bookmarkers'));
    }

    //return getLicenseeName
    public function getLicenseeName()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            //$category_type_id = CategoryTypes::where('categorytypes_id','1')->with('CompanyCategoryType')->get();
            $license_name = BookmarkersCompany::where('category_type_id',1)->with('Shopcompany')->get();
            return $license_name;
        }
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mrno' => 'required',
            'application_fee' => 'numeric|between:0,999999999.99',
            'transfer_fee' => 'numeric|between:0,999999999.99',
            'annual_license_fee'=> 'numeric|between:0,999999999.99',
            'investigation_fee_local'=> 'numeric|between:0,999999999.99',
            'investigation_fee_foreign' => 'numeric|between:0,999999999.99',
            'premise_fee' => 'numeric|between:0,999999999.99',
            'renewal_fee' => 'numeric|between:0,999999999.99',
            'operating_fee' => 'numeric|between:0,999999999.99',
           
            'bank_guarantee' => 'numeric|between:0,999999999.99',
            'reference_amount' => 'numeric|between:0,999999999.99',   
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


        $user = new Accounts();
        $user->company_id = $request->company_id['company_id'];
        $user->mrno = $request->mrno;
        $user->application_fee = $request->application_fee;
        $user->transfer_fee = $request->transfer_fee;
        $user->annual_license_fee = $request->annual_license_fee;
        $user->investigation_fee_local = $request->investigation_fee_local;
        $user->investigation_fee_foreign = $request->investigation_fee_foreign;
        $user->premise_fee = $request->premise_fee;
        $user->renewal_fee = $request->renewal_fee;
        $user->operating_fee = $request->operating_fee;
        $user->totals = $request->totals;
        $user->bank_guarantee = $request->bank_guarantee;
        $user->reference_amount = $request->reference_amount;

        
        $user->id = $id;    
        $user->save();

   
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Accounts Entry mrno: $request->mrno";
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id =$id; $id;   
        $userLog->save();

        return back()->with('success','Added succesfully');
    }



    public function updateaccounts(Request $request)
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


        $user = Accounts::findOrFail($request->accounts_id);
        $user->company_id = $request->company_id['company_id'];
        $user->mrno = $request->mrno;
        $user->application_fee = $request->application_fee;
        $user->transfer_fee = $request->transfer_fee;
        $user->annual_license_fee = $request->annual_license_fee;
        $user->investigation_fee_local = $request->investigation_fee_local;
        $user->investigation_fee_foreign = $request->investigation_fee_foreign;
        $user->premise_fee = $request->premise_fee;
        $user->renewal_fee = $request->renewal_fee;
        $user->operating_fee = $request->operating_fee;
        $user->totals = $request->totals;
        $user->bank_guarantee = $request->bank_guarantee;
        $user->reference_amount = $request->reference_amount;

        
        $user->id = $id;     
        $user->save();

   
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Accounts Entry ";
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id =$id; $id;   
        $userLog->save();

        return back()->with('success','Updated succesfully');
    }

    

    public function upload(Request $request)
    {
       // return $request->company_id;
       // exit();
        //$user->company_id = $request->company_id['company_id'];
        $request->validate([
            'file' => 'required',
        ]);
        $extensions = array("xls","xlsx","xlm","xla","xlc","xlt","xlw","csv");
        $result = array($request->file('file')->getClientOriginalExtension());
        
        if(!in_array($result[0],$extensions)){
            return response()->json(["errors"=>["file"=>["File must be of Excel type ( e.g. .xlsx,.xls, or .csv)"]]],422);
        }
        $path = $request->file;
      
        Excel::import(new BookMarkersImport($request->company_id,$request->licensee_name,$request->license_no,$request->trading_name), $path);

        return response()->json('Success',200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookMarkers  $bookMarkers
     * @return \Illuminate\Http\Response
     */
    public function show(BookMarkers $bookMarkers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookMarkers  $bookMarkers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'bookmarker_id' => 'required',
           
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


        $user = BookMarkers::findOrFail($request->bookmarker_id);
        $user->licensee_name = $request->licensee_name;
        $user->license_no = $request->license_no;
        $user->return_for_the_period_of = $request->return_for_the_period_of;
        $user->return_for_the_period_to = $request->return_for_the_period_to;
 
        $user->date = $request->date;
        $user->bets_no = $request->bets_no;
        $user->deposits = $request->deposits;
        $user->total_sales = $request->total_sales;
        $user->total_payout = $request->total_payout;
        $user->wht = $request->wht;
        $user->winloss = $request->winloss;
        $user->ggr = $request->ggr;
        $user->save();

       // $id=Auth::user()->id;
    //    $userLog->user_category = "User";
    //    // $userLog->audit_log_id = $id;
    //     $userLog->id = Auth::user()->id;  
    //     $userLog->save();
        return back()->with('success','Updated succesfully');
    }


    
    public function destroy(Request $request )
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
    

        $user = Accounts::findOrFail($request->id['accounts_id']);
        $user->delete();
        // return $id=Auth::user();
        // $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Deleted Accounts Record ";
       
        $userLog->user_category = $category;
        //$userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Deleted succesfully');
    }

    public function death(Request $request, $id )
    {
        $id;  $user = Accounts::findOrFail( $id );
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }  



    public function records()
    {
        $currentTime = Carbon::now()->format('d M Y');
      $companies= BookmarkersCompany::all();
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
        return view('vuexy.accounts.index', compact('currentTime','accounts','companies'));

    }
    
    public function accountsadmins()
    {
      $companies= BookmarkersCompany::all();
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
        return view('vuexy.accountsuseradmin.index', compact('accounts','companies'));

    }

 
    public function accountspdf()
    {
        $companies= BookmarkersCompany::all();
        $accounts = Accounts::with('accountscompany')->get();
          $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
          $currentTime = Carbon::now()->format('d M Y');
     
        $pdf = PDF::loadView('vuexy.accounts.acc',compact('currentTime','accounts','companies'));
        return $pdf->download('Accounts.pdf');
    } 


    public function sendmail(Request $request){
        // $data["email"]=$request->get("email");
        // $data["client_name"]=$request->get("client_name");
        // $data["subject"]=$request->get("subject");
       
          $data["email"]=$request->email;
        $data["client_name"]='Simon';
        $data["subject"]=$request->subject;
  
  
        $companies= BookmarkersCompany::all();
        $accounts = Accounts::with('accountscompany')->get();
          $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();
  
  
        $currentTime = Carbon::now()->format('d M Y');
       // $pdf = PDF::loadView('vuexy.accounts.acc', $data);
        $pdf = PDF::loadView('vuexy.accounts.acc', $data,compact('currentTime','accounts','companies'));
  
        try{
        
           
        //    Mail::send('vuexy.mail.test', $data, function($message) use ($data, $subject) {
        //       $email='aramitechnology@gmail.com';
        //       $message->to($email)->subject($subject);
        //   });
            Mail::send('vuexy.mail.test', $data, function($message) use ($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "invoice.pdf");
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


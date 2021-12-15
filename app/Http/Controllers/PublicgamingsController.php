<?php

namespace App\Http\Controllers;

use App\Models\Publicgamings;
use App\Models\PublicLottery;
use App\Models\BookmarkersCompany;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Auth;
use App\Imports\PublicgamingsImport;
use Maatwebsite\Excel\Facades\Excel;


class PublicgamingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicgamings = Publicgamings::all();
        return view('publicgaming.index', compact('publicgamings'));
    }
    
    public function publicgamingadminindex()
    {
        $publicgamings = Publicgamings::all();
        return view('vuexy.publicgaming.index', compact('publicgamings'));
    }


    public function publicgaminguserindex()
    {
        $publicgamings = Publicgamings::all();
        return view('publicgaming.user', compact('publicgamings'));
    }
    //return getLicensee Name
    public function getLicenseeName()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            //$category_type_id = CategoryTypes::where('categorytypes_id','1')->with('CompanyCategoryType')->get();
            $license_name = BookmarkersCompany::with('Shopcompany')->where('category_type_id',"3")->get();
            return $license_name;
        }
    }
    public function publicgamingsdata()
    {

        
        if(request()->get('inactive') == 'on')
        {
            $publicgamings = BookmarkersCompany::where('category_type_id','3')->with('publicGamingcompany')->get()->groupBy('company_id');
            $constraints = '';
            if(request()->get('from')){
                $publicgamings = BookmarkersCompany::where('category_type_id','3')->with(['publicGamingcompany' => function($query){
                    $query->whereDate('return_for_the_period_of', "<", \Carbon\Carbon::create(request()->get('from')));
                }])->get()->groupBy('company_id');
            }
  
            $publiclotterydata = [];
            // $companies = [];
            foreach($publicgamings as $publiclottery)
        
            {
                // array_push($companies,$publiclottery[0]->company_id);
                if($publiclottery[0]->publicGamingcompany->count() > 0)
                {
                    array_push($publiclotterydata,$publiclottery[0]->publicGamingcompany->first());
                }
                else{
                    $arr = ["publicgaming_id"=>null,"company_id"=>$publiclottery[0]->company_id,"public_gamingcompany"=>$publiclottery[0]->public_gamingcompany.company_name,"license_no"=>$publiclottery[0]->trading_name,"license_no"=>$publiclottery[0]->companlicense_noy_id,"return_for_the_period_of"=>null,"return_for_the_period_to"=>null,"date"=>null,"sales"=>"0","sales"=>"0","payouts"=>0,"wht"=>0,"ggr"=>null,"ggrtax"=>null,"id"=>null];
                    array_push($publiclotterydata,$arr);
                }
            }
            return $publiclotterydata;
        }
        else {
            $publicgamings = Publicgamings::with('publicGamingcompany')->get();
            return $publicgamings;
        }

        $publicgamings = Publicgamings::with('publicGamingcompany')->get();
        return $publicgamings;
    }
    
    public function publicgamingsdatauser()
    {

        
        if(request()->get('inactive') == 'on')
        {
            $id= Auth::guard('web')->user()->id;
            $publicgamings = BookmarkersCompany::where('category_type_id','3')->with('publicGamingcompany')->get()->groupBy('company_id');
            $constraints = '';
            if(request()->get('from')){
                $publicgamings = BookmarkersCompany::where('category_type_id','3')->with(['publicGamingcompany' => function($query){
                    $query->whereDate('return_for_the_period_of', "<", \Carbon\Carbon::create(request()->get('from')));
                }])->get()->groupBy('company_id');
            }
  
            $publiclotterydata = [];
            // $companies = [];
            foreach($publicgamings as $publiclottery)
        
            {
                // array_push($companies,$publiclottery[0]->company_id);
                if($publiclottery[0]->publicGamingcompany->count() > 0)
                {
                    array_push($publiclotterydata,$publiclottery[0]->publicGamingcompany->first());
                }
                else{
                    $arr = ["publicgaming_id"=>null,"company_id"=>$publiclottery[0]->company_id,"public_gamingcompany"=>$publiclottery[0]->public_gamingcompany.company_name,"license_no"=>$publiclottery[0]->trading_name,"license_no"=>$publiclottery[0]->companlicense_noy_id,"return_for_the_period_of"=>null,"return_for_the_period_to"=>null,"date"=>null,"sales"=>"0","sales"=>"0","payouts"=>0,"wht"=>0,"ggr"=>null,"ggrtax"=>null,"id"=>null];
                    array_push($publiclotterydata,$arr);
                }
            }
            return $publiclotterydata;
        }
        else {
            $id= Auth::guard('web')->user()->id;
            $publicgamings = Publicgamings::with('publicGamingcompany')->where('id', $id)->latest()->take(3)->get();
            return $publicgamings;
        }
        $id= Auth::guard('web')->user()->id;
        $publicgamings = Publicgamings::with('publicGamingcompany')->where('id', $id)->latest()->take(3)->get();
        return $publicgamings;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'licensee_name' => 'required',
            'return_for_the_period_of' => 'required',
            'return_for_the_period_to' => 'required',       
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

        $user = new Publicgamings();
        $user->company_id = $request->company_id['company_id'];
        $user->license_no = $request->license_no;
        $user->return_for_the_period_of = $request->return_for_the_period_of;
        $user->return_for_the_period_to = $request->return_for_the_period_to;
        $user->date = $request->date;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;
        $user->ggrtax = $request->ggrtax;
        $user->id = $id;

        $user->salesslot = $request->salesslot;
        $user->payoutsslot = $request->payoutsslot;
        $user->whtslot = $request->whtslot;
        $user->ggrslot = $request->ggrslot;
        $user->ggrtaxslot = $request->ggrtaxslot;
        $user->manual_ggtotal = $request->manual_ggtotal;
        

        $user->save();
  
  
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Public Gamings Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Added succesfully');
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
      
        Excel::import(new PublicgamingsImport($request->company_id,$request->licensee_name,$request->license_no,$request->trading_name), $path);

        return response()->json('Success',200);
    }





    public function update(Request $request)
    {
    
        $request->validate([
      
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


        $user = Publicgamings::findOrFail($request->publicgaming_id);
        // $user->licensee_name = $request->licensee_name;
        $user->license_no = $request->license_no;
        $user->return_for_the_period_of = $request->return_for_the_period_of;
        $user->return_for_the_period_to = $request->return_for_the_period_to;
        $user->date = $request->date;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;

        $user->salesslot = $request->salesslot;
        $user->payoutsslot = $request->payoutsslot;
        $user->whtslot = $request->whtslot;
        $user->ggrslot = $request->ggrslot;
        $user->ggrtaxslot = $request->ggrtaxslot;
        $user->save();


      
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Updated Public Gamings Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Updated succesfully');
    }
    public function destroy(Request $request)
    {
  // return $request;

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

       //return $request;
        $user = Publicgamings::findOrFail($request->id);
        $user->delete();

        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Deleted Public Gamings Record Licence No::".$request->licensee_name;
       
        $userLog->user_category = $category;
        //$userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Deleted succesfully');
    }
}

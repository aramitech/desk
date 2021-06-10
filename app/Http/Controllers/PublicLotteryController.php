<?php

namespace App\Http\Controllers;

use App\Models\PublicLottery;
use App\Models\BookmarkersCompany;
use App\Models\PublicLotteryNumber;

use App\Models\AuditLog;
use Auth;
use Illuminate\Http\Request;
use App\Imports\PublicLotteryImport;
use Maatwebsite\Excel\Facades\Excel;

class PublicLotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $publiclotteries = PublicLottery::with('publicLotterycompany')->get();
        return view('publiclottery.index', compact('publiclotteries'));
    }



    public function lotery_shop_name()
    {
        // $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
          $shops = PublicLotteryNumber::with('Lotteryshopnumber')->where('company_id',request()->get('company_id'))->get();
        //$shops = PublicLotteryNumber::all();
        return $shops;
    }




    //return getLicensee Name
    public function getLicenseeName()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            //$category_type_id = CategoryTypes::where('categorytypes_id','1')->with('CompanyCategoryType')->get();
            $license_name = BookmarkersCompany::where('category_type_id',"2")->get();
            return $license_name;
        }
    }
    public function publiclotterydata()
    {

        if(request()->get('inactive') == 'on')
        {
            $publiclotteries = BookmarkersCompany::where('category_type_id','2')->with('publicLotterycompany')->get()->groupBy('company_id');
            $constraints = '';
            if(request()->get('from')){
                $publiclotteries = BookmarkersCompany::where('category_type_id','2')->with(['publicLotterycompany' => function($query){
                    $query->whereDate('return_for_of', "<", \Carbon\Carbon::create(request()->get('from')));
                }])->get()->groupBy('company_id');
            }
  
            $publiclotterydata = [];
            // $companies = [];
            foreach($publiclotteries as $publiclottery)
        
            {
                // array_push($companies,$publiclottery[0]->company_id);
                if($publiclottery[0]->publicLotterycompany->count() > 0)
                {
                    array_push($publiclotterydata,$publiclottery[0]->publicLotterycompany->first());
                }
                else{
                    $arr = ["publiclottery_id"=>null,"company_id"=>$publiclottery[0]->company_id,"license_no"=>$publiclottery[0]->trading_name,"license_no"=>$publiclottery[0]->companlicense_noy_id,"return_for_of"=>null,"return_to"=>null,"date"=>null,"total_tickets_sold"=>"0","sales"=>"0","payouts"=>0,"wht"=>0,"ggr"=>null,"ggrtax"=>null,"id"=>null];
                    array_push($publiclotterydata,$arr);
                }
            }
            return $publiclotterydata;
        }
        else {
            $publiclotteries = PublicLottery::with('publicLotterycompany')->get();
            return $publiclotteries;
        }
        $publiclotteries = PublicLottery::with('publicLotterycompany')->get();
        return $publiclotteries;
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'license_no' => 'required',
            'return_for_of' => 'required',
            'return_to' => 'required',
            'total_tickets_sold' => 'required',
        
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

        $user = new PublicLottery();
        $user->company_id = $request->company_id['company_id'];
        $user->license_no = $request->license_no;
        $user->lottery_name= $request->publiclotterynumber_id['publiclotterynumber_id'];
        $user->return_for_of = $request->return_for_of;
        $user->return_to = $request->return_to;
        $user->date = $request->date;
        $user->total_tickets_sold = $request->total_tickets_sold;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;
          $user->ggrtax = $request->ggrtax;
          $user->id = $id;
        $user->save();


        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Public Lottery Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Added succesfully');
    }

    

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function lotterynumber_store(Request $request)
     {
         $request->validate([
             'lottery_number' => 'required',
             'status' => 'required',
               
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
 
         $user = new PublicLotteryNumber();
         $user->company_id = $request->company_id['company_id'];
         $user->license_no = $request->license_no;
         $user->lottery_name= $request->lottery_name;

         $user->lottery_number = $request->lottery_number;
         $user->status = $request->status;
         $user->periodfrom = $request->periodfrom;
         $user->periodto = $request->periodto;
         
           $user->id = $id;
         $user->save();
 
 
         //log
         $userLog = new AuditLog();
         $userLog->audit_module = "User";
         $userLog->audit_activity = "Added Public Lottery Entry Licence No:".$request->license_no;
        
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
      
        Excel::import(new PublicLotteryImport($request->company_id,$request->licensee_name,$request->license_no,$request->trading_name), $path);

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

        $user = PublicLottery::findOrFail($request->publiclottery_id);
        $user->company_id = $request->company_id['company_id'];
        $user->license_no = $request->license_no;
        $user->license_no = $request->license_no;
        $user->return_for_of = $request->return_for_of;
        $user->return_to = $request->return_to;
        $user->date = $request->date;
        $user->total_tickets_sold = $request->total_tickets_sold;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;
        $user->save();


        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Updated Public Lottery Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Updated succesfully');
    }


    public function destroy(Request $request)
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
         $user = PublicLottery::findOrFail($request->id);
        $user->delete();

        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Deleted Public Lottery Record Licence Name:".$request->licensee_name;
       
        $userLog->user_category = $category;
        //$userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();
        return back()->with('success','Deleted succesfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PublicLottery;
use App\Models\BookmarkersCompany;
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
        $user = new PublicLottery();
        $user->company_id = $request->company_id['company_id'];
        $user->license_no = $request->license_no;
        $user->return_for_of = $request->return_for_of;
        $user->return_to = $request->return_to;
        $user->date = $request->date;
        $user->total_tickets_sold = $request->total_tickets_sold;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;
          $user->ggrtax = $request->ggrtax;
          $user->id = Auth::user()->id;
        $user->save();


        $id=Auth::user()->id;
        $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Public Lottery Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = Auth::user()->id;  
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

        $id=Auth::user()->id;
        $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Updated Public Lottery Entry Licence No:".$request->license_no;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id = Auth::user()->id;  
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


        $user = PublicLottery::findOrFail($request->publiclottery_id);
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

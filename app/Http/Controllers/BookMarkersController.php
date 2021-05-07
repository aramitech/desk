<?php

namespace App\Http\Controllers;

use App\Models\BookMarkers;
use App\Models\BookmarkersCompany;
use App\Models\CategoryTypes;
use App\Models\Shops;
use Illuminate\Http\Request;
use Auth;
use App\Models\AuditLog;
use App\Imports\BookMarkersImport;
use Maatwebsite\Excel\Facades\Excel;
use EloquentBuilder;

class BookMarkersController extends Controller



{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
      $bookmarkers = BookMarkers::with('bookmarkerscompany')->get();
      //  return view('bookmarkers.index', compact('bookmarkers'));


        $bookmarkers = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'), request()->all())->get();
        return view('bookmarkers.index', compact('bookmarkers'));

    }


    public function bookmarkersdata()
    {
        $bookmarkers = BookMarkers::with('bookmarkerscompany')->get();
        return $bookmarkers;
    }

    public function bookmarker_shop_name()
    {
        $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
        $shops = Shops::with('Shopcompany')->where('category_type_id',1)->get();
       
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
            $license_name = BookmarkersCompany::where('category_type_id',1)->get();
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


        $user = new BookMarkers();
        $user->company_id = $request->company_id['company_id'];

        $user->shop_id = $request->shop_id['shop_id'];
        $user->licensee_name = $request->licensee_name;
        $user->license_no = $request->license_no;
        $user->return_for_the_period_of = $request->return_for_the_period_of;
        $user->return_for_the_period_to = $request->return_for_the_period_to;
        $user->branch = $request->branch;
        $user->date = $request->date;
        $user->bets_no = $request->bets_no;
        $user->deposits = $request->deposits;
        $user->total_sales = $request->total_sales;
        $user->total_payout = $request->total_payout;
        $user->wht = $request->wht;
        $user->winloss = $request->winloss;
        $user->ggr = $request->ggr;
        $user->ggrtax = $request->ggrtax;
        $user->id = $id;    
        $user->save();

     
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Bookmarkers Entry For Licence Name:".$request->licensee_name;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->id =$id; $id;   
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
        $user->branch = $request->branch;
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
    
        $user = BookMarkers::findOrFail($request->id);
        $user->delete();

        // return $id=Auth::user();
        // $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Deleted Bookmarkers Record For Licence Name:".$request->licensee_name;
       
        $userLog->user_category = $category;
        //$userLog->audit_log_id = $id;
        $userLog->id = $id;  
        $userLog->save();

        return back()->with('success','Deleted succesfully');
    }
}

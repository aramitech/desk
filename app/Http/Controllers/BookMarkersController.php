<?php

namespace App\Http\Controllers;

use App\Models\BookMarkers;
use App\Models\BookmarkersCompany;
use App\Models\CategoryTypes;
use Illuminate\Http\Request;
use Auth;
use App\Models\AuditLog;
class BookMarkersController extends Controller
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

        $bookmarkers = BookMarkers::all();
        return view('bookmarkers.index', compact('bookmarkers'));
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
        
        // $request->validate([
        //     'licensee_name' => 'required',
        //     'return_for_the_period_of' => 'required',
        //     'return_for_the_period_to' => 'required',
        //     'branch' => 'required',
        //     'bets_no' => 'required',
        
        // ]);
        //return  $ff=$request->company_id;
     
        $user = new BookMarkers();
        $user->company_id = $request->company_id['company_id'];
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
        $user->id = Auth::user()->id;
        $user->save();

        $id=Auth::user()->id;
        $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Added Bookmarkers Entry For Licence Name:".$request->licensee_name;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->user_id = Auth::user()->id;  
        $userLog->save();

        return back()->with('success','Added succesfully');
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

        $id=Auth::user()->id;
        $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Updated Bookmarkers Entry For Licence Name:".$request->licensee_name;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->user_id = Auth::user()->id;  
        $userLog->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
        $user = BookMarkers::findOrFail($request->bookmarker_id);
        $user->delete();

        $id=Auth::user()->id;
        $email=Auth::user()->email;
        //log
        $userLog = new AuditLog();
        $userLog->audit_module = "User";
        $userLog->audit_activity = "Deleted Bookmarkers Record For Licence Name:".$request->licensee_name;
       
        $userLog->user_category = "User";
       // $userLog->audit_log_id = $id;
        $userLog->user_id = Auth::user()->id;  
        $userLog->save();

        return back()->with('success','Deleted succesfully');
    }
}

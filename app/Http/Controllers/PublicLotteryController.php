<?php

namespace App\Http\Controllers;

use App\Models\PublicLottery;
use App\Models\BookmarkersCompany;

use Illuminate\Http\Request;

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
        $publiclotteries = PublicLottery::all();
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
        return back()->with('success','Added succesfully');
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
        return back()->with('success','Updated succesfully');
    }


    public function destroy(Request $request)
    {
        $user = PublicLottery::findOrFail($request->publiclottery_id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
}

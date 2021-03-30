<?php

namespace App\Http\Controllers;

use App\Models\BookMarkers;
use App\Models\BookmarkersCompany;
use Illuminate\Http\Request;
use Auth;
class AdminBookMarkersController extends Controller
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
        
        $bookmarkers = BookMarkers::with('bookmarkerscompany')->get();
        return view('bookmarkers.admin', compact('bookmarkers'));
    }


    //return groups
    public function getLicenseeName()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
           // $shop_id=Auth::user()->shop_id;
           // $customer_id=Auth::user()->userShopUser['customer_id'];
            $license_name = BookmarkersCompany::all();
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
            'licensee_name' => 'required',
            'return_for_the_period_of' => 'required',
            'return_for_the_period_to' => 'required',
            'branch' => 'required',
            'bets_no' => 'required',
        
        ]);
        $user = new BookMarkers();
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
    public function edit(BookMarkers $bookMarkers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookMarkers  $bookMarkers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookMarkers $bookMarkers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookMarkers  $bookMarkers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = BookMarkers::findOrFail($request->bookmarker_id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
}

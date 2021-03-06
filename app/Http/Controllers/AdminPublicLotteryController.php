<?php

namespace App\Http\Controllers;

use App\Models\PublicLottery;
use Illuminate\Http\Request;

class AdminPublicLotteryController extends Controller
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
        return view('publiclottery.admin', compact('publiclotteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'license_no' => 'required',
            'return_for_of' => 'required',
            'return_to' => 'required',
            'total_tickets_sold' => 'required',
        
        ]);
        $user = new PublicLottery();
        $user->company_name = $request->company_name;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicLottery  $publicLottery
     * @return \Illuminate\Http\Response
     */
    public function show(PublicLottery $publicLottery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PublicLottery  $publicLottery
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicLottery $publicLottery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PublicLottery  $publicLottery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicLottery $publicLottery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicLottery  $publicLottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = PublicLottery::findOrFail($request->publiclottery_id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Publicgamings;
use App\Models\PublicLottery;
use App\Models\BookmarkersCompany;
use Illuminate\Http\Request;

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


    //return getLicensee Name
    public function getLicenseeName()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            //$category_type_id = CategoryTypes::where('categorytypes_id','1')->with('CompanyCategoryType')->get();
            $license_name = BookmarkersCompany::where('category_type_id',"3")->get();
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
        ]);
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
        $user->save();
        return back()->with('success','Added succesfully');
    }


    public function update(Request $request)
    {
        $request->validate([
      
        ]);
        $user = Publicgamings::findOrFail($request->publicgaming_id);
        $user->licensee_name = $request->licensee_name;
        $user->license_no = $request->license_no;
        $user->return_for_the_period_of = $request->return_for_the_period_of;
        $user->return_for_the_period_to = $request->return_for_the_period_to;
        $user->date = $request->date;
        $user->sales = $request->sales;
        $user->payouts = $request->payouts;
        $user->wht = $request->wht;
        $user->ggr = $request->ggr;
        $user->save();
        return back()->with('success','Updated succesfully');
    }

}

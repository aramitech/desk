<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('company.index', compact('companies'));
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
            'email' => 'required|email|unique:users,email',
            'trading_name' => 'required',
            'license_no' => 'required',
            'contact' => 'required',
            'physicaladdress' => 'required',
        
        ]);
        $user = new Company();
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->save();
        return back()->with('success','Added succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
        ]);
        $user = Company::findOrFail($request->company_id);
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
        $user = Company::findOrFail($request->company_id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
}

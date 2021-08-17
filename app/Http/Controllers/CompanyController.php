<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\BookmarkersCompany;
use App\Models\PublicGamingCompany;
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
        $companies = Company::where('category_type_id','1')->get();
        return view('company.publiclottery', compact('companies'));
    }
    public function bookmarkers()
    {
        //

        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        return view('company.bookmarkers', compact('bookmarkers'));
    }

    public function bookmarkers2()
    {
        //

        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        return view('vuexy.company.bookmarkers', compact('bookmarkers'));
    }

    
    public function publickgaming()
    {
        //

        $publickgamings = PublicGamingCompany::all();
        return view('company.publickgaming', compact('publickgamings'));
    }
    

    //return Company Name
    public function getCompanyName()
    {
        {
            $company_name = BookmarkersCompany::all();
            return $company_name;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addpubliclottery(Request $request)
    {
        
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'trading_name' => 'required',
            'license_no' => 'required',
            'contact' => 'required',
            'physicaladdress' => 'required',
        
        ]);
        $user = new BookmarkersCompany();
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->branch = $request->branch;
        $user->category_type_id = '2'; 
        $user->paybillno = $request->paybillno;
        
        $user->save();
        return back()->with('success','Added succesfully');
    }
    

    public function addbookmarkers(Request $request)
    {
        
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'trading_name' => 'required',
            'license_no' => 'required',
            'contact' => 'required',
            'physicaladdress' => 'required',
        
        ]);
        $user = new BookmarkersCompany();
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->branch = $request->branch;
        // $user->category_type_id = $request->category_type_id['categorytypes_id'];   
        $user->category_type_id = '1'; 
        $user->paybillno = $request->paybillno;
        
        $user->save();
        return back()->with('success','Added succesfully');
    }
    
    public function addpublicgaming(Request $request)
    {
        
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'trading_name' => 'required',
            'license_no' => 'required',
            'contact' => 'required',
            'physicaladdress' => 'required',
        
        ]);
        $user = new BookmarkersCompany();
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->branch = $request->branch;
        // $user->category_type_id = $request->category_type_id['categorytypes_id'];   
        $user->category_type_id = '3'; 
        $user->paybillno = $request->paybillno;
        
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
        return   $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
           $user->paybillno = $request->paybillno;
          return $user->status = $request->status;
        $user->save();
        return back()->with('success','Updated succesfully');
    }


  
    public function updateBookmarkersCompany(Request $request)
    {
        
        $user = BookmarkersCompany::findOrFail($request->company_id);
        $user->company_name = $request->company_name;
        $user->trading_name = $request->trading_name;
        $user->license_no = $request->license_no;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->physicaladdress = $request->physicaladdress;
        $user->branch = $request->branch;
        $user->category_type_id = $request->category_type_id['categorytypes_id'];   
        $user->paybillno = $request->paybillno;
        $user->status = $request->status;
        $user->save();
        return back()->with('success','Updated succesfully');
    }


    public function destroy(Request $request)
    {
       
        $user = Company::findOrFail($request->id['company_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
        public function destroybookmarkerscompany(Request $request)
    {
        $user = BookmarkersCompany::findOrFail($request->id['company_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
        public function destroypublicgamingcompany(Request $request)
    {
        $user = PublicGamingCompany::findOrFail($request->id['publicgaming_company_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }

    
    public function death(Request $request, $id )
    {
        $id;  $user = BookmarkersCompany::findOrFail( $id );
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }  


    

}

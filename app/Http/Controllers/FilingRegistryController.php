<?php

namespace App\Http\Controllers;

use App\Models\FileRegistry;
use App\Models\BookmarkersCompany;
use App\Models\Registry;
use Illuminate\Http\Request;

class FilingRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 

    public function index()
    {
        //
        $registries = FileRegistry::All();
        return view('registry.filing', compact('registries'));
    }
    
    //return Company Name
    public function class_names()
    {
        {
            $class_names = Registry::all();
            return $class_names;
        }
    }


    
    public function store(Request $request)
    {
        
        $user = new FileRegistry();   
        $user->registry_id = $request->registry_id['registry_id'];
        $user->folio = $request->folio;
        $user->subject_heading = $request->subject_heading;
        $user->registry_date = $request->registry_date;
        $user->status = $request->status;        
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

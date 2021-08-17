<?php

namespace App\Http\Controllers;

use App\Models\FileRegistry;
use App\Models\AssignRegistry;
use App\Models\Registry;
use Illuminate\Http\Request;

class AssignRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 

    public function index()
    {
        //
        $registries = AssignRegistry::All();
        return view('registry.assign', compact('registries'));
    }
    
    //return Company Name
    public function folio_names()
    {
        {
            $class_names = FileRegistry::with('FileRegistryRegistry')->get();
            return $class_names;
        }
    }


    
    public function store(Request $request)
    {
         $request;
        $user = new AssignRegistry();   
            $user->file_registry_id = $request->file_registry_id['file_registry_id'];
        $user->registry_id = '3';
           $user->date_issued = $request->date_issued;
        $user->issued_to = $request->issued_to;
        $user->duration_issued = $request->duration_issued;
           $user->reason_you_issue = $request->reason_you_issue;        
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

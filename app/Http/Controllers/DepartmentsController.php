<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\BookmarkersCompany;
use App\Models\Departments;
use Illuminate\Http\Request;
use Auth;
class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }




    public function index()
    {
        //
        $departments = Departments::All();
        return view('departments.index', compact('departments'));
    }

    
    public function department_names()
    {
        {
            $class_names = Departments::all();
            return $class_names;
        }
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'department_name' => 'required',    
        ]);
         $user = new Departments();
        $user->department_name = $request->department_name;

        $user->save();
        return back()->with('success','Added succesfully');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'department_name' => 'required',        
        ]);
        $user = Departments::findOrFail($request->departments_id);
        $user->department_name = $request->department_name;
  
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
       
        $user = Departments::findOrFail($request->id['departments_id']);
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

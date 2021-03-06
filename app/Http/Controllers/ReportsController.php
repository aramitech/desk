<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookMarkers;
use App\Models\BookmarkersCompany;
use Illuminate\Http\Request;
use Auth;
use Hash;
Use \Carbon\Carbon;
use PDF;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->get();
        return view('reports.index', compact('bookmarkers'));
    }


    public function bookmarkersreport(Request  $request)
    {
       
         $request;
         $company_name=BookmarkersCompany::all('company_name');
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->where('company_name',$company_name)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',3)->get();
        $bookmarkers = BookMarkers::where('company_id',3)->get();
        return view('reports.bookmarkers', compact('bookmarkers','bcompanies'));
    }


    public function createPDF(Request  $request) {
        // retreive all records from db
        $data = BookMarkers::where('company_id',3)->get();
  
        // share data to view
        view()->share('BookMarkers',$data);
        $pdf = PDF::loadView('reports.pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');

    }
    public function indexpubliclottery()
    {
        $bookmarkers = BookmarkersCompany::where('category_type_id',2)->get();
        return view('reports.index', compact('bookmarkers'));
    }
    public function publiclotterysreport()
    {
        $bcompanies = BookmarkersCompany::where('category_type_id',2)->get();
        $bookmarkers = BookMarkers::all();
        return view('reports.publiclottery', compact('bookmarkers','bcompanies'));
    }


    public function indexpublicgaming()
    {
        $bookmarkers = BookmarkersCompany::where('category_type_id',3)->get();
        return view('reports.index', compact('bookmarkers'));
    }
    public function publicgamingreport() 
    {
        $bcompanies = BookmarkersCompany::where('category_type_id',3)->get();
        $bookmarkers = BookMarkers::all();
        return view('reports.publicgaming', compact('bookmarkers','bcompanies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Added succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function updaterole(Request $request)
    {
    
        $user = User::findOrFail($request->id);
        $user->editstatus = $request->editstatus;
        $user->deletestatus = $request->deletestatus;
        $user->bookmarkersstatus = $request->bookmarkersstatus;
        $user->publiclotterystatus = $request->publiclotterystatus;
        $user->publicgamingstatus = $request->publicgamingstatus;
 
        $user->save();
        return back()->with('success','Role Updated succesfully');
    }


    
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }


    public function profile()
    {
        $auth=Auth::user()->email; 
        $users = User::where('email',$auth)->get();
        return view('profile.index', compact('users'));
    }

}

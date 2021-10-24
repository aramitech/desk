<?php

namespace App\Http\Controllers;

use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\BookmarkersCompany;
use App\Models\Adminusers;
use Illuminate\Http\Request;
use Auth;
use Hash;





class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adminusers = Adminusers::all();
        return view('adminusers.index', compact('adminusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new Adminusers();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
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
        $user = Adminusers::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request)
    {
       
        $user = Adminusers::findOrFail($request->admin_id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }



    public function adminchangepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $user = Adminusers::findOrFail(Auth::guard('admin')->user()->admin_id);
        if(!Hash::check($request->old_password, Auth::guard('admin')->user()->password)){
            return back()->with('failure','Incorrect old password');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        // return view('adminusers.index', compact('adminusers'));
        return back()->with('success','Updated succesfully');
    }
    
}

<?php

namespace App\Http\Controllers;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

use EloquentBuilder;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
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
        $user->perspnal_file_no = $request->perspnal_file_no;
        $user->section = $request->section;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success','Added succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'  
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perspnal_file_no = $request->perspnal_file_no;
        $user->section = $request->section;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'  
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
        $user->sendsms_status = $request->sendsms_status;
        $user->bookmarkersshop_status = $request->bookmarkersshop_status;
        $user->companies_status = $request->companies_status;        
        $user->user_accounts_status = $request->user_accounts_status;
        $user->records_bookmarkers = $request->records_bookmarkers;

        $user->records_public_lotery = $request->records_public_lotery;

        $user->records_public_gaming = $request->records_public_gaming;

        $user->save();
        return back()->with('success','Role Updated succesfully');
    }


    
    public function destroy(Request $request)
    {
       return $user = User::findOrFail($request->id['id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }


    public function profile()
    {
        $auth=Auth::user()->email; 
        $users = User::where('email',$auth)->get();
        return view('profile.index', compact('users'));
    }


    public function assignroleuser($id)
    {
        $auditLogs = EloquentBuilder::to(AuditLog::where('id',$id)->with('userlogs'),request()->all())->get();

         $users = User::where('id',$id)->get();
        return view('vuexy.user.user_edit', compact('users','auditLogs'));
    }

}

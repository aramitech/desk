<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Auth;
use Hash;
use EloquentBuilder;
class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $auditLogs = EloquentBuilder::to(AuditLog::with('userlogs'),request()->all())->get();
       /// $auditLogs = AuditLog::with('userlogs')->get();

      //  $auditLogs = AuditLog::all()->with('userlogs')->get();
      //  $contactsAirtime = Airtime_contact::where('customer_id',$customer_id)->with('contactGroup')->get();

        return view('vuexy.calender.index', compact('auditLogs'));
    }

    public function auditlogsdata()
    {
      
        $auditLogs = AuditLog::with('userlogs')->get();
        return $auditLogs;
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
}

<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use Hash;
use EloquentBuilder;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todoes = Task::all();
       /// $auditLogs = AuditLog::with('userlogs')->get();

      //  $auditLogs = AuditLog::all()->with('userlogs')->get();
      //  $contactsAirtime = Airtime_contact::where('customer_id',$customer_id)->with('contactGroup')->get();
      return view('vuexy.todo.index', compact('todoes'));
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
    public function addtask(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'description' => 'required',    
           ]);
      
        $user = new Task();
        $user->title = $request->title;
        $user->description = $request->description;
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

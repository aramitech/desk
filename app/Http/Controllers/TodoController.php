<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Task;
use App\Models\User;


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
        $users= User::all();
        $todoes = Task::all();
          return view('vuexy.todo.index', compact('todoes','users'));
    }


    public function taskindex()
    {
        $users= User::all();
        $auth= Auth::user()->id;
      //  $todoes = Task::where('id',$auth)->where('status','!=','Seen')->get();
        $todoes = Task::where('id',$auth)->get();
        return view('vuexy.todo.indexuser', compact('todoes','users'));
    }

    public function taskindexreplied()
    {
        $users= User::all();
        $auth= Auth::user()->id;
        $todoes = Task::where('id',$auth)->where('status','Seen')->get();
        return view('task.index', compact('todoes','users'));
    }
    
    public function user()
    {
        //
        $users= User::where('id','11')->get();
        $todoes = Task::all();
       return view('vuexy.todo.user', compact('todoes','users'));
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
           if(Auth::guard('admin')->check())
           {     
               $id= Auth::guard('admin')->user()->admin_id;
               $email= Auth::guard('admin')->user()->email;  
               $category= 'Admin'; 
           }
         elseif(Auth::guard('web')->check())
         {
           //$userLog->id = Auth::user()->id;
           $id= Auth::guard('web')->user()->id;
           $email= Auth::guard('web')->user()->email;  
           $category= 'User'; 
         }
        $user = new Task();
        $user->title = $request->title;
        $user->description = $request->description;
        $user->id = $id;

        $user->all_users = $request->all_users;

        
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


    public function replytotask(Request $request)
    {
  
        $user = Task::findOrFail($request->task_id);
        $user->replymessage = $request->replymessage;
        $user->status = 'Seen';
        $user->save();
        return back()->with('success','Updated succesfully');
    }
    


    public function records_confirm_task(Request $request)
    {
        $user = Task::findOrFail($request->id);
        $user->status = 'Seen';
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    


    public function deletetask(Request $request, $id)
    {
      
        $user = Task::findOrFail($request->id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
}

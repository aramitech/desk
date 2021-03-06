<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

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

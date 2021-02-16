<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:admin',['except' => ['logout']]);
    }
    //show login view
    public function loginView()
    {
        return view('auth.admin-login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
           'email' => 'required',
           'password' => 'required|min:6'
       ]);

      
       //check database connection and handle the exception
       try{
           $db=\DB::connection()->getPdo();
           
           //attempt to login the admins in
           if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
               //if successful redirect to admin dashboard
               return redirect()->route('admin-dashboard');
           }
           // if unsuccessfull redirect back to the login for with form data
           return redirect()->back()->withInput($request->only('email','remember'));
           // return response()->json($data);
       }
       catch(\Exception $e) {

           return abort('504', 'An error occurred.');
           
       }
    }
    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}

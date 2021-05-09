<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Log;
use Hash;
Use \Carbon\Carbon;
use App\Classes\SendSms;

class OtpController extends Controller
{
    //
    public function view()
    {
        //generate code
        $code = rand(1000,9999);
        session(['otpCode' => $code]);
        //send sms
        $destination = Auth::guard('admin')->user()->phone;
        $sms = new SendSms;
        $sms->sendMessage($destination, 'Verification code '.$code);

        return view('auth.otp');
    }
    public function verify(Request $request)
    {
        $request->validate(['otp'=>'required']);
        if($request->otp == Auth::guard('admin')->user()->otpCode)
        {
            session(['twofa' => 1]);
            
            return redirect()->route('admin-dashboard');
        }
        else{
            return back()->with('failure','Invalid code');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Log;
use Hash;
Use \Carbon\Carbon;
use App\Classes\SendSms;

class UserOtpController extends Controller
{
    //
  public function view_user()
  {
      //generate code
      // $code = rand(1000,9999);
      $code = '1111';
      session(['otpCode' => $code]);
      //send sms
      $destination = Auth::guard('web')->user()->phone;
      // $sms = new SendSms;
      // $sms->sendMessage($destination, 'Verification code '.$code);

      return view('auth.userotp');
  }

  public function verify_user(Request $request)
  {
      $request->validate(['otp'=>'required']);
      if($request->otp == Auth::guard('web')->user()->otpCode)
      {
          session(['twofa' => 1]);
          
          return redirect()->route('home');
      }
      else{
          return back()->with('failure','Invalid code');
      }
  }

//   public function verify_user(Request $request)
//   {
//        $request->otp ;
//     //  return  (Auth::guard('web')->user()->otpCode);
//    // return $gtf=  $request->validate(['otp'=>'required']);
//       //return ($request->otp == Auth::guard('web')->user()->otpCode);
//        if($request->otp == Auth::guard('web')->user()->otpCode)
//      // if($request->otp == '1111')
//       {
//           session(['twofa' => 1]);
          
//           return redirect()->route('home');
//       }
//       else{
//           return back()->with('failure','Invalid code');
//       }
//   }


    
}

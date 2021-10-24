<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Models\BookmarkersCompany;
use App\Models\Accounts;
use EloquentBuilder;
use Carbon\Carbon;
class MailController extends Controller
{

   public function sendmail(Request $request){
      // $data["email"]=$request->get("email");
      // $data["client_name"]=$request->get("client_name");
      // $data["subject"]=$request->get("subject");
     
      $data["email"]='testmail@aramitechnology.com';
      $data["client_name"]='Simon Kamau';
      $data["subject"]='Test Mail';


      $companies= BookmarkersCompany::all();
      $accounts = Accounts::with('accountscompany')->get();
        $accounts = EloquentBuilder::to(Accounts::with('accountscompany'), request()->all())->get();


      $currentTime = Carbon::now()->format('d M Y');
     // $pdf = PDF::loadView('vuexy.accounts.acc', $data);
      $pdf = PDF::loadView('vuexy.accounts.acc', $data,compact('currentTime','accounts','companies'));

      try{
         $subject='hhhh';
         
      //    Mail::send('vuexy.mail.test', $data, function($message) use ($data, $subject) {
      //       $email='aramitechnology@gmail.com';
      //       $message->to($email)->subject($subject);
      //   });
          Mail::send('vuexy.mail.test', $data, function($message) use ($data,$pdf) {
          $message->to($data["email"], $data["client_name"])
          ->subject($data["subject"])
          ->attachData($pdf->output(), "invoice.pdf");
          });
      }catch(JWTException $exception){
          $this->serverstatuscode = "0";
          $this->serverstatusdes = $exception->getMessage();
      }
      if (Mail::failures()) {
           $this->statusdesc  =   "Error sending mail";
           $this->statuscode  =   "0";

      }else{

         $this->statusdesc  =   "Message sent Succesfully";
         $this->statuscode  =   "1";
      }
      return response()->json(compact('this'));
}
}


//    public function sendMail()
//    {    
//         Mail::to('aramitechnology@gmail.com')->send(new OrderShipped());
//    }
// }
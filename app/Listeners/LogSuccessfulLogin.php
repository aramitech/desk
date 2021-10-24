<?php

namespace App\Listeners;
use App\Models\AuditLogins;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
      $id = $event->user->id; 
		$user_types_id = $event->user->user_types_id; 
    $name = $event->user->name; 
    $email = $event->user->email; 
    $perspnal_file_no = $event->user->perspnal_file_no; 
		$status = "Success";
		$ip=\Illuminate\Support\Facades\Request::ip();
		$time = now();


    $user = new AuditLogins();
    $user->id = $id;
    $user->user_types_id = $user_types_id;
    $user->name = $name;
    $user->email = $email;
    $user->perspnal_file_no = $perspnal_file_no;
    $user->save();  



		\Log::info($user_types_id);
    \Log::info($name);
    \Log::info($email);
    \Log::info($perspnal_file_no);
    }
}
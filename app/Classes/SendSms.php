<?php

namespace App\Classes;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;
use Auth;
class SendSms{

    protected $username;
    protected $password;
    protected $uri='https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky'; //sendsms2a for onfon
    protected $uri2='http://www.mobisky.biz/api/sendsms2.php?';  //sendsms2a for onfon
    protected $client;
    protected $response;


    public function __construct($username_, $password_)
    {
    $this->username = $username_;
    $this->password  = $password_;
    $this->client=null;
    $this->response=null;

    }
    /**
         * Use this function to initiate send sms.
         * @param $phone | string
         * @param $message | string
         * @return mixed|string
         */

    public function sendMessage($phone,$message){
        
        $parameters=[
            'username'=>$this->username,
            'password'=>$this->password,
            'destination'=>$phone,
            'message'=>$message,
        ];
        
        //create a guzzleclient
        //check if its prudential
        $api="";
        if(Auth::guard('organization')->check())
        {
            $api=Auth::guard('organization')->user()->api_account;
        }
        elseif(Auth::guard('web')->check())
        {
            $api=Auth::guard('web')->user()->api_account;
        }
        
        
        
        if($api==64){
            $this->client=new Client();
            //send the message
            $this->response=$this->client->request('GET',$this->uri2.http_build_query($parameters));
            $body= $this->response->getBody();
            if (strpos($body, 'Success') !== false) {
               //return $this->uri.http_build_query($parameters);
                return "Sent";
                
                
            }
            else{
                Log::info($body);
                return "Failed- ".$body;
            } 
        }
        elseif($api!=64){
          
             $this->client=new Client();
            //send the message
            $this->response=$this->client->request('GET',$this->uri.http_build_query($parameters));
            $body= $this->response->getBody();
            if (strpos($body, 'Success') !== false) {
               //return $this->uri.http_build_query($parameters);
                return "Sent";
                
                
            }
            else{
                Log::info($body);
                return "Failed- ".$body;
            }
        }
        
       


    }

}
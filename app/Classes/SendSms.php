<?php

namespace App\Classes;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;
use Auth;
class SendSms{

    protected $uri='https://www.mobisky.biz/api/sendsms2a.php?username=bclb&password=B@910CLB&message=test&destination=0702142629&source=Mobisky'; //sendsms2a for onfon
    protected $uri2='http://www.mobisky.biz/api/sendsms2.php?username=bclb&password=B@910CLB&';  //sendsms2a for onfon
    protected $client;
    protected $response;

    /**
         * Use this function to initiate send sms.
         * @param $phone | string
         * @param $message | string
         * @return mixed|string
         */

    public function sendMessage($phone,$message){
        
        $parameters=[
            'destination'=>$phone,
            'message'=>$message,
        ];
        try{
          
             $this->client=new Client();
            //send the message
            $this->response=$this->client->request('GET',$this->uri.http_build_query($parameters));
            $body= $this->response->getBody();
            if (strpos($body, 'Success') !== false) {
               //return $this->uri.http_build_query($parameters);
                return "Sent";
                Log::info($body);
                
            }
            else{
                Log::info($body);
                return "Failed- ".$body;
            }  
        }
        catch(\Exception $e)
        {
            Log::info($e);
        }
    }

}
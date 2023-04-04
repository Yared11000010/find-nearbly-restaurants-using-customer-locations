<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
  
class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("56645d2b", "fhhagAQd79QC9WCk");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("251912651113",'tt' , 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        
        
    }
}
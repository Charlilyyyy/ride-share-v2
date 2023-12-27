<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(
            config('services.twilio.sid'),
            config('services.twilio.auth_token')
        );
    }

    public function sendVerificationCode($to,$loginCode)
    {

        // $notifiable->update([
        //     'login_code' => $loginCode
        // ]);

        // return 'hi';

        $message = $this->twilio->messages->create(
            $to,
            [
                'from' => config('services.twilio.phone_number'),
                'body' => "Your verification code is: $loginCode",
            ]
        );

        return $message;
    }
}

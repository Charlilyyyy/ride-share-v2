<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\SendVerificationCode;
use App\Services\TwilioService;

class LoginController extends Controller
{
    public function login(Request $request, TwilioService $twilio){

        $request->validate([
            'phone' => 'required'
        ]);

        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if(!$user){
            return response()->json(['message' => 'Could not process a user with the phone number.'],402);
        }

        $loginCode = rand(111111, 999999);

        $user->update([
            'login_code' => $loginCode
        ]);

        $twilio->sendVerificationCode($request->phone,$loginCode);

        return response()->json(['message' => "Session contain code"]);
    }

    // public function sendVerificationCode(Request $request, TwilioService $twilio)
    // {
    //     $phoneNumber = $request->input('phone_number');
    //     $verificationCode = generateVerificationCode(); // Implement your code generation logic

    //     $twilio->sendVerificationCode($phoneNumber, $verificationCode);

    //     // Save the verification code or whatever else you need to do
    // }

    public function verify(Request $request){
        $request->validate([
            'phone' => 'required',
            'login_code' => 'required|numeric|between:111111,999999'
        ]);

        $user = User::where('phone',$request->phone)
            ->where('login_code',$request->login_code)
            ->first();

        if ($user){
            $user->update([
                'login_code' => null
            ]);

            return $user->createToken($request->login_code)->plainTextToken;
        }

        return response()->json(['message' => 'Invalid verification code.'], 401);
    }

    public function setName(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        // return 'pop';
        return $request;

        $user = User::where('phone',$request->phone)->first();

        $user->update([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Name Added.'], 200);
    }
}

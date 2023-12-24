<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        // return [
        //     'phone' => $request->phone,
        //     'login_code' => $request->login_code
        // ];

        $request->validate([
            'phone' => 'required|numeric|digits_between:10,11'
        ]);

        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if(!$user){
            return response()->json(['message' => 'Could not process a user with the phone number.'],402);
        }
        
    }
}

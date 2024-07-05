<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $messages = [
            'email.required' => 'Email field is required',
            'email.email' => 'Should be email',
            'password.required' => 'Password field is required',
        ];
        if ($validator->fails()) {
            return response()->json(['status'=>422 ,'errors'=>$messages]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
 
            return response()->json(['status'=>200,'message'=>'User Logged In Successfully']);
        }
 
    }
    public function logout(Request $request){

        Auth::logout();

        return response()->json(['status'=>200,'message'=>'User Logged Out Successfully']);
    }
}

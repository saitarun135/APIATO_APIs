<?php

namespace App\Containers\UserRegistration\UserContainer\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use App\Containers\UserRegistration\UserContainer\Models\UserContainer;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;

class UserController extends ApiController
{
    public function register(Request $request)
    {
        $user = new UserContainer([
            'fullName'=> $request->input('fullName'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password')),
            'mobile'=> $request->input('mobile'),
        ]);     
        $user->save();
        return response()->json(['message'=>'user registered successfully']);
     }

     public function login(Request $request)
     {
         $req = Validator::make($request->all(), [
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         $email = $request->get('email');
         $user = UserContainer::where('email', $email)->first();
 
         if (!$user) {
             return response()->json(['status' => 400, 'message' => "Invalid credentials! email doesn't exists"]);
         }
 
         if ($req->fails()) {
             return response()->json(['status' => 403, 'message' => "please enter the valid details"]);
         }
 
         $token = JWTAuth::fromUser($user);
         if (!$token) {
             return response()->json(['status' => 401, 'message' => 'Unauthenticated']);
         }
         return $this->generateToken($token);
     }
 
     public function generateToken($token)
     {
         return response()->json([
             'status' => 201,
             'message' => 'succesfully logged in',
             'token' => $token
         ]);
     }
}

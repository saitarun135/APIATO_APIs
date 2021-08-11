<?php

namespace App\Containers\UserRegistration\UserContainer\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use App\Containers\UserRegistration\UserContainer\Models\UserContainer;
use App\Containers\UserRegistration\UserContainer\Models\Users;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use DB;
use Hash;
use App\Containers\UserRegistration\UserContainer\Models\BlogModel;

class UserController extends ApiController
{ 
    public function register(Request $request)
    {
        $user = new UserContainer([
            'fullName' => $request->input('fullName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'mobile' => $request->input('mobile'),
        ]);
        $user->save();
        return response()->json(['message' => 'user registered successfully']);
    }

    public function login(Request $request)
    {
    
        $req = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->get('email');
        $user = UserContainer::where('email', $email)->first();
        $password = $request->get('password');
        $userPassword = UserContainer::where('email', $email)->value('password');
        if (!Hash::check($password, $userPassword)) {
            return response()->json(['message' => "please check your  password"]);
        }
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
            'message' => 'succesfully logged in...',
            'token' => $token
        ]);
    }

    public function sample()
    {
        // $users = DB::table('user_containers')->where('fullName', 'sai')->paginate(3);
        // // return response()->json(['message'=>'Hello world...!']);
        // return $users;
        $user = new BlogModel();
        $token = JWTAuth::getToken();
        $id = JWTAuth::getPayload($token)->toArray();
        $user->user_id = $id["sub"];
        return DB::table('blogs_table')->where('user_id', $user->user_id)->get();
    }
   
  
}



























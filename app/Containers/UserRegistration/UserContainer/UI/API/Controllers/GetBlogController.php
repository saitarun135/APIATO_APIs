<?php

namespace App\Containers\UserRegistration\UserContainer\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use DB;
use JWTAuth;
use App\Containers\UserRegistration\UserContainer\Models\BlogModel;
class GetBlogController extends ApiController
{
 public function getAndDisplayBlogs(){
    $user = new BlogModel();
    $token = JWTAuth::getToken();
    $id = JWTAuth::getPayload($token)->toArray();
    $user->user_id = $id["sub"];
    return DB::table('blogs_table')->where('user_id', $user->user_id)->get();
 }
}

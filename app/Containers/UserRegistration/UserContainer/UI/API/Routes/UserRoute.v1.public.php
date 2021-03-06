<?php

/**
 * @apiGroup           UserContainer
 * @apiName            UserController
 *
 * @api                {POST} /v1/postuser Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\Controller;
use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\HelloWorldController;
use Illuminate\Support\Facades\Route;
use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\UserController;


Route::get('message',[UserController::class,'retriveBlogs']);
Route::post('userregister', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


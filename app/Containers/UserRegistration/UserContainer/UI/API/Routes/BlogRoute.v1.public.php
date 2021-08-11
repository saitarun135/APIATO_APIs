<?php

/**
 * @apiGroup           UserContainer
 * @apiName            BlogsCreation
 *
 * @api                {POST} /v1/postblog Endpoint title here..
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
use Illuminate\Support\Facades\Route;
use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\BlogController;

Route::group(["middleware"=>['auth.jwt']],function(){
Route::post('postblog', [BlogController::class, 'upload']);
Route::post('deleteBlog/{id}',[BlogController::class,'deleteUserBlog']);
});
    // ->name('api_usercontainer_blogs_creation')
    // ->middleware(['auth:api']);


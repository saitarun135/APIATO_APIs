<?php

/**
 * @apiGroup           UserContainer
 * @apiName            getAndDisplayBlogs
 *
 * @api                {GET} /v1/retrive Endpoint title here..
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

use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\GetBlogController;
use Illuminate\Support\Facades\Route;

Route::get('retrive', [GetBlogController::class, 'getAndDisplayBlogs']);
    // ->name('api_usercontainer_get_and_display_blogs')
    // ->middleware(['auth:api']);


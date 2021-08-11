<?php

/**
 * @apiGroup           UserContainer
 * @apiName            displayBlogs
 *
 * @api                {GET} /v1/getblogs Endpoint title here..
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

use App\Containers\UserRegistration\UserContainer\UI\API\Controllers\GetBlogsController;
use Illuminate\Support\Facades\Route;

Route::get('getblogs', [GetBlogsController::class, 'GetBlogs']);
    // ->name('api_usercontainer_display_blogs')
    // ->middleware(['auth:api']);


<?php

/**
 * @apiGroup           Authentication
 * @apiName            Controller
 *
 * @api                {GET} /v1/hello Endpoint title here..
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

use App\Containers\AppSection\Authentication\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('hello', [Controller::class, 'sayHello']);
    // ->name('api_authentication_controller')
    // ->middleware(['auth:api']);


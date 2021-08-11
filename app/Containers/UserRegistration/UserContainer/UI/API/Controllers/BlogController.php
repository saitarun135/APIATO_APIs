<?php

namespace App\Containers\UserRegistration\UserContainer\UI\API\Controllers;

use App\Containers\UserRegistration\UserContainer\UI\API\Requests\CreateUserContainerRequest;
use App\Containers\UserRegistration\UserContainer\UI\API\Requests\DeleteUserContainerRequest;
use App\Containers\UserRegistration\UserContainer\UI\API\Requests\GetAllUserContainersRequest;
use App\Containers\UserRegistration\UserContainer\UI\API\Requests\FindUserContainerByIdRequest;
use App\Containers\UserRegistration\UserContainer\UI\API\Requests\UpdateUserContainerRequest;
use App\Containers\UserRegistration\UserContainer\UI\API\Transformers\UserContainerTransformer;
use App\Containers\UserRegistration\UserContainer\Actions\CreateUserContainerAction;
use App\Containers\UserRegistration\UserContainer\Actions\FindUserContainerByIdAction;
use App\Containers\UserRegistration\UserContainer\Actions\GetAllUserContainersAction;
use App\Containers\UserRegistration\UserContainer\Actions\UpdateUserContainerAction;
use App\Containers\UserRegistration\UserContainer\Actions\DeleteUserContainerAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

// use Auth;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Http\Request;
use DB;
use App\Containers\UserRegistration\UserContainer\Models\BlogModel;
use App\Containers\UserRegistration\UserContainer\Models\UserContainer;

class BlogController extends ApiController
{

    public function upload(Request $request)
    {
        $blog = new BlogModel();
        $blog->name = $request->input('name');
        $blog->price = $request->input('price');
        $blog->image = $request->input('image');
        $blog->rating = $request->input('rating');
        $blog->country = $request->input('country');
        $blog->description = $request->input('description');
        $token=$request->bearerToken();
        $tokenParts = explode(".", $token); 
        //$tokenHeader = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        //$jwtHeader = json_decode($tokenHeader);
        $jwtPayload = json_decode($tokenPayload);
        $blog->user_id=$jwtPayload->sub;
        $blog->save();
        return response()->json(['success' => 'Blog Added successfully']);
    }
    public function deleteUserBlog(Request $request){
        try{
        $user = new BlogModel();
        $token = JWTAuth::getToken();
        $id = JWTAuth::getPayload($token)->toArray();
        $user->user_id = $id["sub"];
        }
        catch(Exception $e){
        return response()->json(['status' => 404, 'message' => 'Invalid credentials']);
        }
        $user->id = $request->input('id');
        
        $userPresent = UserContainer::where('id', $user->user_id)->first();
        if(!$userPresent){
        return response()->json(['status' => 409, 'message' => 'No user is present']);
        }
        $blogId = BlogModel::where('id', $user->id)->value('id');
        
        if($blogId == $user->id){
        if($user->delete()){
        return response()->json(['status' => 201, 'message' => 'Blog deleted successfully']);
        }
        
        }
        return response()->json(['status' => 409, 'message' => 'No blog is available with the given Id']);
        }
    public function displayBlogs()
    {
        $user = new BlogModel();
        $token = JWTAuth::getToken();
        $id = JWTAuth::getPayload($token)->toArray();
        $user->user_id = $id["sub"];
        return DB::table('blogs_table')->where('user_id', $user->user_id)->get();
    }
    public function getAllUserContainers()
    {
        
    }

    public function createUserContainer(CreateUserContainerRequest $request): JsonResponse
    {
        $usercontainer = app(CreateUserContainerAction::class)->run($request);
        return $this->created($this->transform($usercontainer, UserContainerTransformer::class));
    }

    public function findUserContainerById(FindUserContainerByIdRequest $request): array
    {
        $usercontainer = app(FindUserContainerByIdAction::class)->run($request);
        return $this->transform($usercontainer, UserContainerTransformer::class);
    }

  

    public function updateUserContainer(UpdateUserContainerRequest $request): array
    {
        $usercontainer = app(UpdateUserContainerAction::class)->run($request);
        return $this->transform($usercontainer, UserContainerTransformer::class);
    }

    public function deleteUserContainer(DeleteUserContainerRequest $request): JsonResponse
    {
        app(DeleteUserContainerAction::class)->run($request);
        return $this->noContent();
    }
}

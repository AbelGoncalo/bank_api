<?php

namespace App\Http\Controllers;

use App\DTOs\UserDTO;
use App\Http\Requests\RegisterUserRequest;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //

    public function __construct(private readonly UserService $userService)
    {
        
    }

    public function register(RegisterUserRequest $request): JsonResponse{

        $userDto= UserDTO::frmApiFormRequest($request);
        $user= $this->userService->creatUser($userDto);

        return $this->apiResponse(['user'=>$user]);

       // return response()->json(['user'=>$user,'success'=>true,'message'=>'Register successful'],201);


    }
}

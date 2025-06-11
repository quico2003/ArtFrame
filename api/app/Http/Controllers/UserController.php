<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRequest;
use App\Services\v1\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ){
    }

    public function register(UserRequest $request): JsonResponse
    {
        try {
            $input = $request->validated();
            $input["password"] = Hash::make($input["password"]);
            $user = $this->userService->register($input);
            return response()->json($user, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        try {
            $input = $request->validated();
            $login = $this->userService->login($input);
            return response()->json($login, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
}

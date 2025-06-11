<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\v1\AdminService;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(
        private AdminService $adminService
    ){
    }

    public function register(UserRequest $request): JsonResponse
    {
        try {
            $input = $request->validated();
            $input["password"] = Hash::make($input["password"]);
            $user = $this->adminService->register($input);
            return response()->json($user, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
    
}

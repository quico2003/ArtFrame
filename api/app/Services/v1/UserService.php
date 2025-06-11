<?php

namespace App\Services\v1;

use App\Models\User;
use App\Repositories\v1\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{

    public function __construct(
        private UserRepository $userRepository
    ) {
    }


    public function register(array $input): ?User
    {
        try {
            $input["is_admin"] = 0;
            return $this->userRepository->register($input);
        }catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
        }
    }

    public function login (array $input): array|bool
    {
        try {
            if (Auth::attempt($input)) {
                $user = Auth::user();
                $token = $user->createToken("user-token", [], now()->addDay())->plainTextToken;
                return [
                    "user" => $user,
                    "token" => $token
                ];
            }else{
                return false;
            }
        } catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
        }
    }
}

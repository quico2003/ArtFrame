<?php

namespace App\Services\v1;

use App\Models\User;
use App\Repositories\v1\UserRepository;
use Auth;
use Exception;
use Log;

class AdminService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function register(array $input): ?User
    {
        try {
            $input["is_admin"] = 1;
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
                $token = $user->createToken("admin-token", [], now()->addDay())->plainTextToken;
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

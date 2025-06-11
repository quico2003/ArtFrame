<?php

namespace App\Repositories\v1;

use App\Models\User;

class UserRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private User $user
    )
    {
    }

    public function register(array $input): User
    {
        return $this->user->create($input);
    }
}

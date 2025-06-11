<?php

namespace App\Services\v1;

use App\Models\Product;
use App\Models\User;
use App\Repositories\v1\ProductsRepositories;
use App\Repositories\v1\ProductsRepository;
use Exception;
use Log;

class ProductsService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private ProductsRepository $productsRepository
    )
    {
    }

    public function create(array $input, User $user): ?Product
    {
        try{
            $input["user_id"] = $user->id;
            return $this->productsRepository->create($input);
        }catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
            
        }
    }
}

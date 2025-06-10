<?php

namespace App\Services\v1;

use App\Models\Category;
use App\Repositories\v1\CategoryRepository;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    
    public function __construct(
        private CategoryRepository $categoryRepository
    )
    {
    }

    public function create(array $input): ?Category
    {
        try{
            return $this->categoryRepository->create($input);
        }catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
            
        }
    }

    public function getAll(): Collection
    {
        try {
            return $this->categoryRepository->getAll();
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
        }
    }

    public function update(int $id, array $input): bool
    {
        try {
            return $this->categoryRepository->update($id, $input);
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
        }
    }
    
    public function delete(int $id): bool
    {
        try {
            return $this->categoryRepository->delete($id);
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            throw new Exception($e->getMessage(), 422);
        }
    }
}

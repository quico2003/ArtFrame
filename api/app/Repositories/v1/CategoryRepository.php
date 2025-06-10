<?php

namespace App\Repositories\v1;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private Category $category
    )
    {
    }

    public function create(array $input): Category
    {
         return $this->category->create($input);
    }

    public function getAll(): Collection
    {
        return $this->category->get();
    }
    
    public function update(int $id, array $input):bool
    {
        return $this->category->find($id)->update($input);
    }
    
    public function delete(int $id):bool
    {
        return $this->category->find($id)->delete();
    }
}

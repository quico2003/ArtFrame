<?php

namespace App\Repositories\v1;

use App\Models\Product;

class ProductsRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private Product $product
    )
    {
    }

    public function create(array $input): Product
    {
         return $this->product->create($input);
    }
}

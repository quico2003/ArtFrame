<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\v1\ProductsService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct(
        private ProductsService $productsService
    ) {
    }

    public function store(ProductRequest $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $input = $request->validated();
            $product = $this->productsService->create($input, $user);
            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
    
    public function getAll(ProductRequest $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $input = $request->validated();
            $product = $this->productsService->create($input, $user);
            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
}

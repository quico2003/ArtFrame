<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category\CategorySimpleResource;
use App\Services\v1\CategoryService;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ) {
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        try {
           $input = $request->validated();
           $category = $this->categoryService->create($input);
            return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
   
    public function getAll(): JsonResponse
    {
        try {
           $categories = $this->categoryService->getAll();
           $categoriesResource = CategorySimpleResource::collection($categories);
           return response()->json($categoriesResource, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
    
    public function update(int $id, CategoryRequest $request): JsonResponse
    {
        try {
           $input = $request->validated();
           $category = $this->categoryService->update($id, $input);
           return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
    
    public function delete(int $id): JsonResponse
    {
        try {
            $category = $this->categoryService->delete($id);
            return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ]);
        }
    }

}

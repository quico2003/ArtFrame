<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix("category")->controller(CategoryController::class)->group(function() {
    Route::post("/", "store");
    Route::get("/", "getAll");
    Route::patch("/{id}", "update");
    Route::delete("/{id}", "delete");
});


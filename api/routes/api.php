<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRoles;
use Illuminate\Support\Facades\Route;


Route::prefix("user")->controller(UserController::class)->group(function () {
    Route::post("/", "register");
    Route::post("/login", "login");
});

Route::prefix("admin")->controller(AdminController::class)->group(function () {
    Route::post("/", "register");
    Route::post("/login", "login");
});


Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(CheckAdminRoles::class)->group(function () {
        Route::prefix("category")->controller(CategoryController::class)->group(function() {
            Route::post("/", "store");
            Route::get("/", "getAll");
            Route::patch("/{id}", "update");
            Route::delete("/{id}", "delete");
        });
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(CheckAdminRoles::class)->group(function () {
        Route::prefix("products")->controller(ProductsController::class)->group(function() {
            Route::post("/", "store");
            Route::get("/", "getAll");
            Route::patch("/{id}", "update");
            Route::delete("/{id}", "delete");
        });
    });
});



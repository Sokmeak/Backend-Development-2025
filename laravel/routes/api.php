<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




// the route for the CategoryController
Route::controller(CategoryController::class) ->prefix('categories')->group(function(){
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory');
    Route::get('/{categoryId}', 'getCategory');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});


// the route for the ProductController
Route::controller(ProductController::class) ->prefix('products')->group(function(){
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct');
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct');
    Route::delete('/{productId}', 'deleteProduct');
});


// In Laravel, defining "API" routes within your model routes allows you to specifically
// design and manage endpoints that are intended for external applications to interact 
// with your data through a structured JSON format, providing a clear separation between 
// your web interface and the API functionality, while also leveraging Laravel's powerful 
// routing and model features to efficiently retrieve and manipulate data for API requests. 






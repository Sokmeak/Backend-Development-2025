<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// all routes for the AuthorController
Route::controller(AuthorController::class) ->prefix('authors')->group(function(){
    Route::get('/', 'getAuthors');
    Route::post('/', 'createAuthor');
    Route::get('/{authorId}', 'getAuthor');
    Route::patch('/{authorId}', 'updateAuthor');
    Route::delete('/{authorId}', 'deleteAuthor');
});

// all routes for the CommentController
Route::controller(CommentController::class) ->prefix('comments')->group(function(){
    Route::get('/', 'getComments');
    Route::post('/', 'createComment');
    Route::get('/{commentId}', 'getComment');
    Route::patch('/{commentId}', 'updateComment');
    Route::delete('/{commentId}', 'deleteComment');
});

// all routes for the RatingController
Route::controller(RatingController::class) ->prefix('ratings')->group(function(){
    Route::get('/', 'getRatings');
    Route::post('/', 'createRating');
    Route::get('/{ratingId}', 'getRating');
    Route::patch('/{ratingId}', 'updateRating');
    Route::delete('/{ratingId}', 'deleteRating');
});

// all routes for the ArticleController
Route::controller(ArticleController::class) ->prefix('articles')->group(function(){
    Route::get('/', 'getArticles');
    Route::post('/', 'createArticle');  
    Route::get('/{articleId}', 'getArticle');
    Route::patch('/{articleId}', 'updateArticle');
    Route::delete('/{articleId}', 'deleteArticle');
}); 


// Route::controller(CategoryController::class) ->prefix('categories')->group(function(){
//     Route::get('/', 'getCategories');
//     Route::post('/', 'createCategory');
//     Route::get('/{categoryId}', 'getCategory');
//     Route::patch('/{categoryId}', 'updateCategory');
//     Route::delete('/{categoryId}', 'deleteCategory');
// });

// Route::controller(ProductController::class) ->prefix('products')->group(function(){
//     Route::get('/', 'getProducts');
//     Route::post('/', 'createProduct');
//     Route::get('/{productId}', 'getProduct');
//     Route::patch('/{productId}', 'updateProduct');
//     Route::delete('/{productId}', 'deleteProduct');
// });







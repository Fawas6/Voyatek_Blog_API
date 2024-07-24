<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['token'])->group(function () {
    Route::post('/create-blog', [BlogController::class, 'createBlog']);
    Route::post('/create-post/{blogID}', [PostController::class, 'createPost']);
    Route::get('/get-all-blogs', [BlogController::class, 'getAllBlogs']);
    Route::get('/get-all-blog-posts/{blogID}', [PostController::class, 'getAllBlogPosts']);
    Route::get('/get-blog/{id}', [BlogController::class, 'getBlog']);
    Route::get('/get-post/{id}', [PostController::class, 'getPost']);
    Route::post('/update-blog/{id}', [BlogController::class, 'updateBlog']);
    Route::delete('/delete-blog/{id}', [BlogController::class, 'deleteBlog']);
    Route::post('/update-post/{id}', [PostController::class, 'updatePost']);
    Route::delete('/delete-post/{id}', [PostController::class, 'deletePost']);
    Route::post('/post/{id}/like', [PostController::class, 'like']);
    Route::post('/create-comment/{postID}', [CommentController::class, 'createComment']);
});




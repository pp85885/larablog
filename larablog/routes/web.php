<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Auth;



Auth::routes();
// Comment
Route::post('delete-comment',[CommentController::class, 'destroy']);
Route::post('edit-comment',[CommentController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index']);
Route::get('/tutorial/{category_slug}',[FrontendController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}',[FrontendController::class, 'viewPost']);

Route::post('/save-post',[CommentController::class, 'saveComment']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/add-post', [PostController::class, 'add']);
    Route::post('/add-post', [PostController::class, 'savePost']);
    Route::get('/edit-post/{id}', [PostController::class, 'editPost']);
    Route::put('/update-post/{id}',[PostController::class, 'update']);    
    Route::get('/delete-post/{post_id}', [PostController::class, 'destroy']);

    Route::get('/users',[UserController::class, 'index']);
    Route::get('/edit-user/{user_id}',[UserController::class, 'edit']);
    Route::post('/update-user/{id}',[UserController::class, 'update']);
});
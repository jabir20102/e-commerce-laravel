<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CommentController;

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::get('/products',[ApiController::class,'index'])->name('api_products');
Route::get('/product/{id}',[ApiController::class,'product'])->name('api_product');
// for the cart
Route::get('/cart/{user}', [CartController::class, 'index'])->name('cart');
Route::get('/cart/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
// add comments 
Route::post('/comment', [CommentController::class, 'add'])->name('comment.add');

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [App\Http\Controllers\API\AuthController::class, 'profile']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});



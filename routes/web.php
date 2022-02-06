<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\App;


Route::get('/', [HomeController::class, 'index']);
Route::get('/hot-sale', [HomeController::class, 'hotSale'])->name('hotSale');
Route::get('/product/{id}/{slug?}', [HomeController::class, 'viewProduct'])->name('product.view');

Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

Route::post('/add/comment/{product_id}', [CommentController::class, 'add'])->name('comment.add');


// Route::get('/setLocale/{locale?}', [LocaleController::class,'setLocale']); //locale? is optional parameter
// Route::get('/getLocale', [LocaleController::class,'getLocale']); //locale? is optional parameter

Auth::routes();

Route::get('/signIn',  [AdminController::class, 'signin'])->name('admin.signin');
Route::post('/signIn', [AdminController::class, 'signin_post'])->name('admin.signin');
Route::get('/admin',   [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/signout',    [AdminController::class, 'signout'])->name('admin.signout');
Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::get('/admin/update', [AdminController::class, 'update'])->name('admin.update');

//    for the images
Route::get('admin/{product_id}/images', [ImageController::class, 'viewImages'])->name('admin.images');
Route::get('admin/product/fetchImages', [ImageController::class, 'images'])->name('students.fetchImages');
Route::post('admin/product/addImages', [ImageController::class, 'addImages'])->name('students.addImages');
Route::post('admin/product/images/delete', [ImageController::class, 'deleteImages'])->name('students.deleteImages');

Route::post('admin/img', [ImageController::class, 'img'])->name('img');


//  for products on admin panel
Route::get('admin/products', [ProductController::class, 'index'])->name('admin.viewProducts');
Route::get('/admin/addProduct', [ProductController::class, 'addProduct'])->name('admin.addProductView');
Route::post('/admin/addProduct', [ProductController::class, 'store'])->name('admin.addProduct');
Route::get('/admin/product/delete/{id}', [ProductController::class, 'productDelete'])->name('admin.product.delete');
Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/admin/{id}/updateProduct', [ProductController::class, 'update'])->name('admin.product.update');

// for the cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');
// Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');


// for the wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/wishlist/{id}/delete', [WishlistController::class, 'delete'])->name('whishlist.delete');
// Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/wishlist', [WishlistController::class, 'add'])->name('wishlist.add');

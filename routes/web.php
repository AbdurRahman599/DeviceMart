<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenAuthenticate;
use Illuminate\Support\Facades\Route;


//BrandList
Route::get('/BrandList',[BrandController::class,'BrandList']);

//Category List
Route::get('/CategoryList',[CategoryController::class,'CategoryList']);

//ProductList
Route::get('/ListProductByCategory/{id}',[ProductController::class,'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}',[ProductController::class,'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}',[ProductController::class,'ListProductByRemark']);

//Slider
Route::get('/ListProductSlider',[ProductController::class,'ListProductSlider']);

//ProductDetails
Route::get('/ProductDetailsById/{id}',[ProductController::class,'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}',[ProductController::class,'ListReviewByProduct']);

//Policy
Route::get('/PolicyByType/{type}',[PolicyController::class,'PolicyType']);


// User Auth
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('/logout',[UserController::class,'UserLogout']);

//UserProfile
Route::post('/CreateProfile',[ProfileController::class,'CreateProfile'])->middleware([TokenAuthenticate::class]);
Route::get('/ReadProfile',[ProfileController::class,'ReadProfile'])->middleware([TokenAuthenticate::class]);

//Product Review
Route::post('/CreateProductReview', [ProductController::class, 'CreateProductReview'])->middleware([TokenAuthenticate::class]);

//Product Wish
Route::get('/CreateWishList/{product_id}',[ProductController::class,'CreateWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/ProductWishList',[ProductController::class,'ProductWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/RemoveWishList/{product_id}',[ProductController::class,'RemoveWishList'])->middleware([TokenAuthenticate::class]);

//Product Cart
Route::post('/CreateCartList',[ProductController::class,'CreateCartList'])->middleware([TokenAuthenticate::class]);
Route::get('/CartList',[ProductController::class,'CartList'])->middleware([TokenAuthenticate::class]);
Route::get('/DeleteCartList/{product_id}',[ProductController::class,'DeleteCartList'])->middleware([TokenAuthenticate::class]);


//Invoice and Payment
Route::get('/InvoiceCreate',[InvoiceController::class,'InvoiceCreate'])->middleware([TokenAuthenticate::class]);
Route::get('/InvoiceList',[InvoiceController::class,'InvoiceList'])->middleware([TokenAuthenticate::class]);
Route::get('/InvoiceProductList/{invoice_id}',[InvoiceController::class,'InvoiceProductList'])->middleware([TokenAuthenticate::class]);

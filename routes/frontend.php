<?php

use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\Auth\SocialController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\MyAccountController;
Route::get("/",[FrontendController::class,"home"])->name("home");
Route::get("/shop",[FrontendController::class,"shopPage"])->name("shop");
Route::get("/filter-products",[FrontendController::class,"filterProducts"])->name("filter.shop");
Route::get("/category/{slug}",[ProductController::class,"ShowCategoryProduct"])->name("product.category");
Route::get("/products/{slug}",[ProductController::class,"ShowProduct"])->name("product.show");
Route::get("/products/search",[ProductController::class,"searchProduct"])->name("product.search");
Route::get("/sign-in",[LoginController::class,"showLoginForm"])->name("signin");
Route::post("/sign-in",[LoginController::class,"login"])->name("signin.verify");
Route::get("/sign-up",[RegisterController::class,"showRegistrationForm"])->name("signup");
Route::post("/sign-up",[RegisterController::class,"register"])->name("signup.store");
Route::get("/google/signin",[SocialController::class, "googleLogin"])->name("google.login");
Route::get("/google/redirect",[SocialController::class,"googleVerify"])->name("facebook.verify");
Route::get("/facebook/signin",[SocialController::class, "googleLogin"])->name("facebook.login");
Route::get("/facebook/redirect",[SocialController::class,"googleVerify"])->name("google.verify");
Route::get("/signout",[LoginController::class,"logout"])->name("signout");




Route::get("/my-profile",[MyAccountController::class, "myAccount"])->middleware("customer");
Route::get("/my-invoice/{id}",[MyAccountController::class, "downloadInvoice"])->name("invoice.download")->middleware("customer");
//*caRT Routes
Route::middleware("customer")->name("cart.")->prefix("/cart/")->controller(CartController::class)->group(function()
{Route::post("/cart-store","storeCart")->name("store");
    Route::put("/cart-update","updateCart")->name("update");
    Route::get("/cart-view","viewCart")->name("view");
    Route::get("/cart-delete/{id}","deleteCart")->name("delete");
});
Route::middleware("customer")->name("order.")->prefix("/order/")->controller(OrderController::class)->group(function()
{Route::get("/checkout","checkout")->name("checkout");
});
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END/*https://github.com/sslcommerz/SSLCommerz-Laravel?tab=readme-ov-file,*/
//https://mail.google.com/mail/u/1/#inbox/FMfcgzQVxlSXJplvMQzqGKxrrXcXrTMP
//https://sandbox.sslcommerz.com/manage/?request=c2VjdXJpdHllbmNyaXB0dHJhbnNhY3Rpb25zTWVyY2hhbnQ6dmlld3NlY3VyaXR5ZW5jcmlwdA%3D%3D

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BacKend\BacKendController;
use App\Http\Controllers\BacKend\ProductController;
use App\Http\Controllers\BacKend\CategoryController;
//use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Route::get("/dashboard",[BacKendController::class,"dashboard"])->name("dashboard")->middleware("auth");
Route::get("/admin/category",[CategoryController::class,"category"])->name("category")->middleware("auth");
Route::post("/admin/category",[CategoryController::class,"categoryStore"])->name("store")->middleware("auth");
Route::get("/admin/delete/{id}",[CategoryController::class,"delete"])->name("delete")->middleware("auth");
Route::get("/admin/edit/{id}",[CategoryController::class,"edit"])->name("edit")->middleware("auth");
Route::put("admin/update/{id}",[CategoryController::class,"update"])->name("update")->middleware("auth");
Route::prefix("/admin/products")->controller(ProductController::class)->name("product.admin.")->middleware("auth")->group(function()
{Route::get("/","product")->name("add");
    Route::post("/Store{id?}","productStore")->name("store");
});
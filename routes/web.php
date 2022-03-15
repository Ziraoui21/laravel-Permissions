<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["prefix"=>"products"],function () {
    Route::get("index",[ProductController::class,"index"])->name("products.index");
    Route::get("show/{id}",[ProductController::class,"show"])->name("products.show");
    Route::get("delete/{id}",[ProductController::class,"delete"])->name("products.delete")->middleware("permission:delete products");

    Route::group(["middleware"=>"role:admin"],function () {
        Route::get("new",[ProductController::class,"new"])->name("products.new");
        Route::post("create",[ProductController::class,"create"])->name("products.create");
    });

    Route::group(["middleware"=>"permission:edit products"],function(){
        Route::get("edit/{id}",[ProductController::class,"edit"])->name("products.edit");
        Route::post("update/{id}",[ProductController::class,"update"])->name("products.update");
    });
});

Auth::routes();

Route::get('/',[ProductController::class,"index"])->middleware("auth");

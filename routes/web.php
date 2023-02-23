<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;

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


Auth::routes();

//unauthorized routes
  Route::get('/',[HomeController::class,'index']);

//authorized routes
Route::middleware(['auth'])->group(function(){

//store
Route::get('/store',[StoreController::class,'index']);

//cart
Route::get('/cart',[CartController::class,'index']);

//checkout
Route::get('/checkout',[CheckoutController::class,'index']);

//thank you page
Route::get('/thank-you',[CheckoutController::class,'thankYou']);

});


//authorized admin routes with admin prefix
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    //Dashboard
    Route::get('/dashboard',[DashboardController::class,'index']);

    //Genre
    Route::get('/genre/view',[GenreController::class, 'index']);
    Route::get('/genre/create',[GenreController::class, 'create']);
    Route::post('/genre/store',[GenreController::class, 'store']);
    Route::get('/genre/delete/{genre}',[GenreController::class, 'destroy']);

    //language
    Route::get('/language/view',[LanguageController::class, 'index']);
    Route::get('/language/create',[LanguageController::class, 'create']);
    Route::post('language/store',[LanguageController::class,'store']);
    Route::get('/language/delete/{language}',[LanguageController::class,'destroy']);

    //movie
    Route::get('movie/view',[MovieController::class,'index']);
    Route::get('movie/create',[MovieController::class,'create']);
    Route::post('movie/store',[MovieController::class,'store']);
    Route::get('movie/edit/{id}',[MovieController::class,'edit']);
    Route::post('movie/update/{movies}',[MovieController::class,'update']);

    //user
    Route::get('user/view',[UserController::class,'index']);
    Route::get('user/create',[UserController::class,'create']);
    Route::post('user/store',[UserController::class,'store']);
    Route::get('user/destroy/{user}',[UserController::class,'destroy']);
    Route::get('user/edit/{user}',[UserController::class,'edit']);
    Route::post('user/update/{user}',[UserController::class,'update']);


});


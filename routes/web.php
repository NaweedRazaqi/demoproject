<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;

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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[HomeController::class,'showdash'])->middleware(['isAdmin']);;

Route::get('/addproduct',[productController::class,'showproduct'])->middleware(['auth']);
Route::post('/addproduct',[productController::class,'storeproduct'])->middleware(['auth']);;

Route::get('/listproducts',[productController::class,'getproductlist'])->middleware(['auth'])->name('listproducts');;

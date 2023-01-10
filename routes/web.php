<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCartController;

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



//ruta principal
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//autentifiacion ui



Route::resource('products',ProductController::class);

Route::resource('products.carts',ProductCartController::class)->only(['store','destroy']);

Route::resource('carts',CartController::class)->only(['index']);

Route::resource('orders',OrderController::class)->only(['create','store']);

//ruta para mostrar los productos


//solo tenes que agregar el nombre de la ruta y el controlador
//Route::resource('products',ProductController::class)->except(['show']);
//Route::resource('products',ProductController::class)->only(['index','create','store']);






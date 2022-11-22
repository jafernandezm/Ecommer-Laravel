<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('main');

//autentifiacion ui
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ruta de productos
Route::get('products',[ProductController::class, 'index'])->name('products.index');

//creamos productos
Route::get('products/create',[ProductController::class, 'create'])->name('products.create');

//mostrar formulario de edicion
Route::post('products',[ProductController::class, 'store'])->name('products.store');

//lista de productos
Route::get('products/{product}',[ProductController::class, 'show'])->name('products.show');

//lista de productos
Route::get('products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');

Route::match(['put','patch'] ,'products/{product}' ,[ProductController::class, 'update'])->name('products.update');

Route::delete('products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');







<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BackendCategoryController;
use App\Http\Controllers\BackendProductController;
use App\Http\Controllers\BackendContactController;
use App\Http\Controllers\BackendWantedController;
use App\Http\Controllers\BackendUserController;
use App\Http\Controllers\FrontendController;

use App\Http\Middleware\FilterMiddleware;

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

// Rutas del frontend

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/home', [FrontendController::class, 'indexlogged'])->name('indexlogged');
Route::get('/home/product/{id}', [FrontendController::class, 'showitem'])->name('showitem');
Route::get('product/create', [FrontendController::class, 'create'])->name('product.create');
Route::post('product/create', [FrontendController::class, 'store'])->name('product.store');
Route::post('product/cart', [FrontendController::class, 'cart'])->name('product.cart');
Route::get('cart/{id}', [FrontendController::class, 'cartview'])->name('cartview');
Route::post('buy/{id}/{idwanted}', [FrontendController::class, 'buyproduct'])->name('buy');
Route::post('contact/{id}', [FrontendController::class, 'createContact'])->name('createContact');
Route::get('delete/{id}', [FrontendController::class, 'destroy']);



Auth::routes(['verify' => true]);

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('segunda', [App\Http\Controllers\HomeController::class, 'segunda'])->name('segunda');

//Auth::routes();

Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change')->middleware('verified');
Route::post('user/change', [UserController::class, 'changeUser'])->name('user.change')->middleware('verified');

Route::get('email/restore/{id}/{email}', [UserController::class, 'restoreEmail'])->name('email.restore')->middleware('signed');
Route::post('email/restore/{id}/{email}', [UserController::class, 'restorePreviousEmail'])->name('email.restore')->middleware('signed');


// Rutas del backend

Route::get('backend', [BackendController::class, 'main'])->name('backend.main')->middleware('auth', 'checkIsAdmin');

Route::resource('backend/category', BackendCategoryController::class, ['names' => 'backend.category'])->middleware('auth', 'checkIsAdmin');
Route::resource('backend/product', BackendProductController::class, ['names' => 'backend.product'])->middleware('auth', 'checkIsAdmin');
Route::resource('backend/contact', BackendContactController::class, ['names' => 'backend.contact'])->middleware('auth', 'checkIsAdmin');
Route::resource('backend/wanted', BackendWantedController::class, ['names' => 'backend.wanted'])->middleware('auth', 'checkIsAdmin');
Route::resource('backend/user', BackendUserController::class, ['names' => 'backend.user'])->middleware('auth', 'checkIsAdmin');
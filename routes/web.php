<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;

use App\Http\Livewire\ListProducts;
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

Route::get('/', Home::class)->name('/');
Route::get('/list-products', ListProducts::class)->name('list-products');

Route::group(['middleware' => ['auth', 'web', 'verified']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('users', UsersController::class);

    Route::resource('list-carts', CartController::class);
});

<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/product/{slug}', 'App\Http\Controllers\HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('add', 'App\Http\Controllers\CartController@add')->name('add');
    Route::get('remove/{slug}', 'App\Http\Controllers\CartController@remove')->name('remove');
});


Route::group(['middleware' => ['auth']], function() {

    Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photo/remove', 'ProductPhotoController@remove')->name('photo.remove');
    });

});

Auth::routes(); 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

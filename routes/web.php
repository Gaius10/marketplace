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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/model', function() {
    // $products = \App\Models\Product::all(); // select * from products

    // $user = new \App\Models\User();
    // $user->name = '';
    // $user->email = '';
    // $user->password = '';
    // $user->save();

    // return \App\Models\User::where('name', 'Jennyfer Klein PhD')->first();

    // return \App\Models\User::paginate(5);

    // Mass Assignment
    // \App\Models\User::create([
    //     'name' => 'Abacate',
    //     'email' => 'abacate@email.com',
    //     'password' => bcrypt('naotempassword')
    // ]);

    // O Mass Update funciona analogamente
});

Route::group(['middleware' => ['auth']], function() {

    Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
    });

});

Auth::routes(); 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

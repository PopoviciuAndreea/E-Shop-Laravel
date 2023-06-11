<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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
});

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        /**
         * Admin User Routes
         
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        }
        );
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'AdminController@index')->name('products.index');
            Route::get('/create', 'AdminController@create')->name('products.create');
            Route::post('/create', 'AdminController@store')->name('products.store');
            Route::get('/{product}/show', 'AdminController@show')->name('products.show');
            Route::get('/{product}/edit', 'AdminController@edit')->name('products.edit');
            Route::patch('/{product}/update', 'AdminController@update')->name('products.update');
            Route::delete('/{product}/delete', 'AdminController@destroy')->name('products.destroy');
        }
        );
        /**
         * Magazin Routes
         
        Route::group(['prefix' => 'magazin'], function() {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
            Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
            Route::patch('/update-cart', [ProductController::class, 'update'])->name('update.cart');
            Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
        });

        Route::get('logout', '\Auth\LoginController@logout');
    });
});

*/

?>
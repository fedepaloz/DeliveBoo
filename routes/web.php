<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::middleware('auth')
->prefix('admin') //ulr iniziale
->namespace('Admin') //controller folder
->name('admin.') // aggiunge al nome
->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('restaurants', 'RestaurantController');
        Route::get('/{any}', function () {
            abort('404');
        })->where('any', '.*');
    });

Route::get('/{any?}', function () {
    return view('guest.home');
})->where('any', '.*');


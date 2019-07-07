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
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout');


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/retention-stats', function(){
    return view('retention-stats');
})->name('retention-stats')->middleware('auth');



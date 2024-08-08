<?php

use App\Http\Controllers\FirmController;
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

// Example Routes
Route::view('/', 'front.home')->name('front.home');
Route::view('/checkout', 'front.checkout')->name('front.checkout');
Route::view('/compare', 'front.compare')->name('front.compare');
Route::view('/profile', 'front.profile')->name('front.profile');
Route::view('/review-report', 'front.review_report')->name('front.review_report');
Route::view('/top', 'front.top')->name('front.top');
Route::view('/user', 'front.user')->name('front.user');
Route::view('/vote', 'front.vote')->name('front.vote');
Route::view('/map', 'front.map')->name('front.map');
Route::view('/register', 'front.register')->name('front.register');

Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


Route::post('firms/request', [FirmController::class, 'request'])->name('firms.request');
Route::get('firms/search', [FirmController::class, 'search'])->name('firms.search');
Route::resource('firms', FirmController::class);

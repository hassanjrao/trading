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

// Example Routes
Route::view('/', 'front.home');
Route::view('/checkout', 'front.checkout');
Route::view('/compare', 'front.compare');
Route::view('/profile', 'front.profile');
Route::view('/review-report', 'front.review_report');
Route::view('/top', 'front.top');
Route::view('/user', 'front.user');
Route::view('/vote', 'front.vote');

Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

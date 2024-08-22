<?php

use App\Http\Controllers\CompareController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
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
Route::view('/profile', 'front.profile')->name('front.profile');
Route::view('/top', 'front.top')->name('front.top');
Route::view('/user', 'front.user')->name('front.user');
Route::view('/vote', 'front.vote')->name('front.vote');
Route::view('/map', 'front.map')->name('front.map');

Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::post('profile/contact-us', [UserProfileController::class, 'submitContactUs'])->name('profile.contact-us');
    Route::post('profile/update-password', [UserProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::resource('profile', UserProfileController::class);

    Route::post('firms/submit-vote', [FirmController::class, 'submitVote'])->name('firms.submit-vote');

    Route::post('review-report/store', [ReviewReportController::class, 'store'])->name('review-report.store');
    Route::resource('review-report', ReviewReportController::class);

});



Route::get('compare', [CompareController::class, 'index'])->name('compare.index');

Route::get('firms/{firmChallenge}/summary', [FirmController::class, 'summary'])->name('firms.summary');
Route::get('firms/most-voted', [FirmController::class, 'mostVoted'])->name('firms.most-voted');
Route::post('firms/request', [FirmController::class, 'request'])->name('firms.request');
Route::get('firms/search', [FirmController::class, 'search'])->name('firms.search');
Route::resource('firms', FirmController::class);


Auth::routes();


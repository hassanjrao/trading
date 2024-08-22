<?php

use App\Http\Controllers\AdminAccountSizeController;
use App\Http\Controllers\AdminAssetTypeController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFirmController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminStepController;
use App\Http\Controllers\AdminTechnologyController;
use App\Http\Controllers\AdminTradingExperienceController;
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
Route::view('/map', 'front.map')->name('front.map');



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



Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function(){

    Route::get('',[AdminDashboardController::class,'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('steps', AdminStepController::class);

    Route::resource('account-sizes', AdminAccountSizeController::class);


    Route::resource('asset-types', AdminAssetTypeController::class);

    Route::resource('countries', AdminCountryController::class);



    Route::resource('firms', AdminFirmController::class);


});


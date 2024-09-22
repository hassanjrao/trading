<?php

use App\Http\Controllers\AdminAccountSizeController;
use App\Http\Controllers\AdminAssetTypeController;
use App\Http\Controllers\AdminCommissionStructureController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFirmController;
use App\Http\Controllers\AdminFirmNewController;
use App\Http\Controllers\AdminFirmReviewController;
use App\Http\Controllers\AdminPaymentMethodController;
use App\Http\Controllers\AdminPayoutMethodController;
use App\Http\Controllers\AdminPlatformController;
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

    Route::get('review-report/get-steps', [ReviewReportController::class, 'getSteps'])->name('review-report.get-steps');
    Route::post('review-report/store', [ReviewReportController::class, 'store'])->name('review-report.store');
    Route::post('review-report/payout-denial', [ReviewReportController::class, 'payoutDenial'])->name('review-report.payout-denial');
    Route::post('review-report/store-breaches', [ReviewReportController::class, 'storeBreaches'])->name('review-report.store-breaches');


    Route::resource('review-report', ReviewReportController::class);


});




Route::get('compare', [CompareController::class, 'index'])->name('compare.index');
Route::get('get-account-sizes', [CompareController::class, 'getAccountSizes'])->name('review-report.get-account-sizes');



Route::get('firms/review-useful/{reviewId}/{isUseful}', [FirmController::class, 'reviewUseFul'])->name('firms.review-useful');
Route::get('firms/{firmChallenge}/summary', [FirmController::class, 'summary'])->name('firms.summary');
Route::get('firms/most-voted', [FirmController::class, 'mostVoted'])->name('firms.most-voted');
Route::post('firms/request', [FirmController::class, 'request'])->name('firms.request');
Route::get('firms/search', [FirmController::class, 'search'])->name('firms.search');

Route::get('firms/{slug}', [FirmController::class, 'showWithSlug'])->name('firms.show-slug');
Route::resource('firms', FirmController::class);


Auth::routes();



Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function(){

    Route::get('',[AdminDashboardController::class,'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('steps', AdminStepController::class);

    Route::resource('account-sizes', AdminAccountSizeController::class);


    Route::resource('asset-types', AdminAssetTypeController::class);

    Route::resource('countries', AdminCountryController::class);
    Route::resource('payment-methods', AdminPaymentMethodController::class);


    Route::resource('payout-methods', AdminPayoutMethodController::class);


    Route::resource('platforms', AdminPlatformController::class);


    Route::resource('technologies', AdminTechnologyController::class);

    Route::resource('commission-structure', AdminCommissionStructureController::class);



    Route::get('firms/requests', [AdminFirmNewController::class, 'requests'])->name('firms.requests');
    Route::post('firms/create-firm', [AdminFirmNewController::class, 'createFirm'])->name('firms.create-firm');
    Route::post('firms/submit-about', [AdminFirmNewController::class, 'submitAbout'])->name('firms.submit-about');
    Route::post('firms/submit-challenges', [AdminFirmNewController::class, 'submitChallenges'])->name('firms.submit-challenges');

    Route::get('firms/inital-data', [AdminFirmNewController::class, 'getInitialData'])->name('firms.inital-data');
    Route::get('firms/{firm}/challenges', [AdminFirmNewController::class, 'challenges'])->name('firms.challenges');
    Route::get('firms/create', [AdminFirmNewController::class, 'create'])->name('firms.create');
    Route::get('firms/{firm}/edit', [AdminFirmNewController::class, 'edit'])->name('firms.edit');
    Route::delete('firms/{firm}', [AdminFirmNewController::class, 'destroy'])->name('firms.destroy');
    Route::get('firms', [AdminFirmNewController::class,'index'])->name('firms.index');

    Route::post('firm-reviews/approve/{firmReviewId}', [AdminFirmReviewController::class, 'approve'])->name('firm-reviews.approve');
    Route::resource('firm-reviews',AdminFirmReviewController::class);

});


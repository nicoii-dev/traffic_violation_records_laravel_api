<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityServiceController;
use App\Http\Controllers\CommunityServiceDetailsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ViolationCategoriesController;
use App\Http\Controllers\ViolationListController;
use App\Http\Controllers\ViolatorController;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\VehicleController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/change-password', [AuthController::class, 'changePassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.email');

    //for authenticated
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/create-user', [UserController::class, 'store']);
    Route::post('/view-user/{id}', [UserController::class, 'show']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::post('/delete-user/{id}', [UserController::class, 'destroy']);
    Route::post('/activate-user/{id}', [UserController::class, 'activateUser']);
    Route::post('/deactivate-user/{id}', [UserController::class, 'deactivateUser']);

    Route::get('/category', [ViolationCategoriesController::class, 'index']);
    Route::post('/create-category', [ViolationCategoriesController::class, 'store']);
    Route::post('/view-category/{id}', [ViolationCategoriesController::class, 'show']);
    Route::put('/update-category/{id}', [ViolationCategoriesController::class, 'update']);
    Route::post('/delete-category/{id}', [ViolationCategoriesController::class, 'destroy']);

    Route::get('/violation', [ViolationListController::class, 'index']);
    Route::post('/violation/{id}', [ViolationListController::class, 'getByCategory']);
    Route::post('/create-violation', [ViolationListController::class, 'store']);
    Route::post('/view-violation/{id}', [ViolationListController::class, 'show']);
    Route::put('/update-violation/{id}', [ViolationListController::class, 'update']);
    Route::post('/delete-violation/{id}', [ViolationListController::class, 'destroy']);

    Route::get('/violator', [ViolatorController::class, 'index']);
    Route::post('/search', [ViolatorController::class, 'searchViolator']);
    Route::post('/create-violator', [ViolatorController::class, 'store']);
    Route::post('/view-violator/{id}', [ViolatorController::class, 'show']);
    Route::put('/update-violator/{id}', [ViolatorController::class, 'update']);
    Route::post('/delete-violator/{id}', [ViolatorController::class, 'destroy']);

    Route::get('/citation', [CitationController::class, 'index']);
    Route::post('/user-citationlist/{id}', [CitationController::class, 'getCitationByEnforcer']);
    Route::post('/violator-citationlist/{id}', [CitationController::class, 'getCitationByViolator']);
    Route::post('/create-citation', [CitationController::class, 'store']);
    Route::post('/view-citation/{id}', [CitationController::class, 'show']);
    Route::put('/update-citation/{id}', [CitationController::class, 'update']);
    Route::post('/delete-citation/{id}', [CitationController::class, 'destroy']);

    Route::post('/license/search', [LicenseController::class, 'searchLicense']);
    Route::put('/license/update/{id}', [LicenseController::class, 'update']);
    
    Route::post('/vehicle/search', [VehicleController::class, 'searchVehicle']);
    Route::put('/vehicle/update/{id}', [VehicleController::class, 'update']);

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/create-payment', [PaymentController::class, 'store']);
    Route::post('/view-payment/{id}', [PaymentController::class, 'show']);
    Route::put('/update-payment/{id}', [PaymentController::class, 'update']);
    Route::post('/delete-payment/{id}', [PaymentController::class, 'destroy']);

    Route::get('/community', [CommunityServiceController::class, 'index']);
    Route::post('/create-community', [CommunityServiceController::class, 'store']);
    Route::post('/view-community/{id}', [CommunityServiceController::class, 'show']);
    Route::put('/update-community/{id}', [CommunityServiceController::class, 'update']);
    Route::post('/delete-community/{id}', [CommunityServiceController::class, 'destroy']);

    Route::get('/community-details', [CommunityServiceDetailsController::class, 'index']);
    Route::post('/view-community-details/{id}', [CommunityServiceDetailsController::class, 'show']);
    Route::put('/update-community-details/{id}', [CommunityServiceDetailsController::class, 'update']);

});
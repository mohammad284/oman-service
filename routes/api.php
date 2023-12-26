<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReviewController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'middleware' => 'api' , 'prefix' => 'auth' ] , function() {
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::post('/logout' , [AuthController::class , 'logout']);
    Route::post('/refresh' , [AuthController::class , 'refresh']);
});


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/updatePassword' , [UserController::class , 'updatePassword']);
    Route::post('/forgetPassword' , [UserController::class , 'forgetPassword']);
    Route::post('/myProfile' , [UserController::class , 'myProfile']);
    Route::post('/editProfile' , [UserController::class , 'editProfile']);
    Route::post('/uploadFile' , [UserController::class , 'uploadFile']);
    Route::post('/deleteFile' , [UserController::class , 'deleteFile']);
    Route::post('/uploadGallery' , [UserController::class , 'uploadGallery']);
    Route::post('/deleteImage' , [UserController::class , 'deleteImage']);

    Route::post('/notifications' , [NotificationController::class , 'notifications']);

});

// About Controller 
Route::get('/aboutUs' , [AboutController::class , 'aboutUs']);
Route::get('/PrivacyTerm' , [AboutController::class , 'PrivacyTerm']);

// Business controller 
Route::get('/main_business' , [BusinessController::class , 'main_business']);
Route::post('/questions' , [BusinessController::class , 'questions']);


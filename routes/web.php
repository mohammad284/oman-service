<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\PrivacyTermController;

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
    return redirect('/admin/home');
});
Auth::routes();
Route::namespace("Admin")->prefix('admin')->group(function(){
    

    Route::namespace('Auth')->group(function(){
      Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
      Route::post('/login',[LoginController::class,'login']);
      Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
    });
        Route::get('/home',[HomeController::class,'index'])->name('admin.home');
        
        // Admins
        Route::get('/admins',[AdminController::class,'admins'])->name('admin.admins');
        Route::post('/addAdmin',[AdminController::class,'addAdmin'])->name('admin.addAdmin');
        Route::post('/updateAdmin',[AdminController::class,'updateAdmin'])->name('admin.updateAdmin');
        Route::get('/deleteAdmin/{admin_id}',[AdminController::class,'deleteAdmin'])->name('admin.deleteAdmin');

        // Setting
        Route::get('/setting',[SettingController::class,'setting'])->name('admin.setting');
        Route::post('/change_setting',[SettingController::class,'change_setting'])->name('admin.change_setting');

        // Main Business
        Route::get('/main_business',[BusinessController::class,'main_business'])->name('admin.main_business');
        Route::post('/add_main',[BusinessController::class,'add_main'])->name('admin.add_main');
        Route::post('/update_main',[BusinessController::class,'update_main'])->name('admin.update_main');
        Route::get('/delete_main',[BusinessController::class,'delete_main'])->name('admin.delete_main');
        Route::get('/add_sub_to_main/{id}',[BusinessController::class,'add_sub_to_main'])->name('admin.add_sub_to_main');
        Route::post('/save_sub_to_main',[BusinessController::class,'save_sub_to_main'])->name('admin.save_sub_to_main');
        Route::get('/delete_main_sub/{main_id}/{sub_id}',[BusinessController::class,'delete_main_sub'])->name('admin.delete_main_sub');
        
        // Sub Business 
        Route::get('/sub_business',[BusinessController::class,'sub_business'])->name('admin.sub_business');
        Route::post('/add_sub',[BusinessController::class,'add_sub'])->name('admin.add_sub');
        Route::post('/update_sub',[BusinessController::class,'update_sub'])->name('admin.update_sub');
        Route::get('/delete_sub',[BusinessController::class,'delete_sub'])->name('admin.delete_sub');
        
        // Questions 
        Route::get('/questions',[QuestionController::class,'questions'])->name('admin.questions');
        Route::post('/addQuestion',[QuestionController::class,'addQuestion'])->name('admin.addQuestion');
        Route::post('/updateQuestion',[QuestionController::class,'updateQuestion'])->name('admin.updateQuestion');
        Route::get('/deleteQuestion/{id}',[QuestionController::class,'deleteQuestion'])->name('admin.deleteQuestion');
        Route::get('/question_to_sub/{id}',[QuestionController::class,'question_to_sub'])->name('admin.question_to_sub');
        Route::post('/save_question_to_sub',[QuestionController::class,'save_question_to_sub'])->name('admin.save_question_to_sub');
        Route::get('/delete_sub_question/{sub_id}/{question_id}',[QuestionController::class,'delete_sub_question'])->name('admin.delete_sub_question');
                
        // Answers
        Route::get('/answers',[AnswerController::class,'answers'])->name('admin.answers');
        Route::post('/addAnswer',[AnswerController::class,'addAnswer'])->name('admin.addAnswer');
        Route::post('/updateAnswer',[AnswerController::class,'updateAnswer'])->name('admin.updateAnswer');
        Route::get('/deleteAnswer/{id}',[AnswerController::class,'deleteAnswer'])->name('admin.deleteAnswer');
        Route::get('/answer_to_question/{id}',[AnswerController::class,'answer_to_question'])->name('admin.answer_to_question');
        Route::post('/save_answer_to_question',[AnswerController::class,'save_answer_to_question'])->name('admin.save_answer_to_question');
        Route::get('/delete_question_answer/{question_id}/{answer_id}',[AnswerController::class,'delete_question_answer'])->name('admin.delete_question_answer');
        
        // Users 
        Route::get('/users',[UserController::class,'users'])->name('admin.users');

        // Providers  
        Route::get('/providers',[UserController::class,'providers'])->name('admin.providers');
        Route::get('/providerDetails/{id}',[UserController::class,'providerDetails'])->name('admin.providerDetails');
        Route::get('/providersRequest',[UserController::class,'providersRequest'])->name('admin.providersRequest');
        Route::get('/providersBlock',[UserController::class,'providersBlock'])->name('admin.providersBlock');
        Route::get('/downloadFile/{id}',[UserController::class,'downloadFile'])->name('admin.downloadFile');
        Route::post('/providerAccept',[UserController::class,'providerAccept'])->name('admin.providerAccept');
       
        // about us
        Route::get('/aboutUs',[AboutController::class,'aboutUs'])->name('admin.aboutUs');
        Route::post('/changeAbout',[AboutController::class,'changeAbout'])->name('admin.changeAbout');

        // notifications
        Route::get('/notifications',[NotificationController::class,'notifications'])->name('admin.notifications');

        // Review 
        Route::get('/reviews',[ReviewController::class,'reviews'])->name('admin.reviews');
        Route::get('/deleteReview/{id}',[ReviewController::class,'deleteReview'])->name('admin.deleteReview');

        // privacy and Term 
        Route::get('/privacy',[PrivacyTermController::class,'privacy'])->name('admin.privacy');
        Route::post('/changePrivacy',[PrivacyTermController::class,'changePrivacy'])->name('admin.changePrivacy');
        
    });
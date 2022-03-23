<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\CreatorPostController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserRevenueController;
use App\Http\Controllers\UserSearchCreatorController;
use App\Models\ReportingPost;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/login', [UserLoginController::class,'show'])->name('login')->middleware('guest');
Route::post('/login', [UserLoginController::class,'login']);
Route::post('/logout', [UserLoginController::class,'logout'])->name('logout');
Route::get('/profile', [UserProfileController::class,'index']);
Route::get('/posts', [UserProfileController::class,'index']);
Route::get('/register',[UserRegisterController::class,'index']);
Route::get('/register/creator',[UserRegisterController::class,'creator']);
Route::post('/register/creator',[UserRegisterController::class,'createCreator']);
Route::post('/register',[UserRegisterController::class,'store']);
Route::get('/posts',[CreatorPostController::class, 'index']);
Route::get('/posts/create',[CreatorPostController::class, 'create']);
Route::post('/posts/create',[CreatorPostController::class, 'store']);
Route::get('/posts/{post:slug}',[CreatorPostController::class, 'show']);
Route::post('/posts/{post:slug}',[CreatorPostController::class, 'storeComplaint']);
Route::get('/posts/{post:slug}/edit',[CreatorPostController::class, 'edit']);
Route::post('/posts/{post:slug}/purchase',[UserPurchaseController::class, 'purchase']);
Route::get('/profile/{user:username}',[UserProfileController::class, 'user']);
Route::get('/profile/{user:username}/edit',[UserProfileController::class, 'edit']);
Route::post('/profile/{user:username}/edit',[UserProfileController::class, 'update']);
Route::get('/storage/creator/files/{file:slug}',[CreatorPostController::class,'showFile']);
Route::get('/top-up/deposit',[TopupController::class,'index']);
Route::post('/top-up/deposit',[TopupController::class,'store']);
Route::get('/notifications',[UserNotificationController::class, 'index']);
Route::get('/notifications/{notif:slug}',[UserNotificationController::class, 'show']);
Route::get('/revenue',[UserRevenueController::class,'index']);
Route::get('/discover/posts',[CreatorPostController::class, 'discoverPosts']);
Route::get('/discover/search/account',[UserSearchCreatorController::class,'index']);
Route::controller(AdminAuthController::class)->prefix('/admin/auth')->group(function(){
    Route::get('/login','showLogin');
    Route::post('/login','login');
});
Route::controller(AdminDashboardController::class)->prefix('/admin/dashboard')->group(function(){
    Route::get('/','index');
    Route::get('/report','reports');
    Route::get('/report/{post:slug}','showTakedown');
    Route::post('/report/{post:slug}','takedown');
});
Route::get('/mantap',function(){
    dd(ReportingPost::query()
    ->selectRaw('sum(post_id) as total')->get());
});

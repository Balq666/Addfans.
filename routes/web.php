<?php

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\CreatorPostController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\UserPurchaseController;
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

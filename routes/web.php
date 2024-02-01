<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auths\loginController;
use App\Http\Controllers\Auths\logoutController;
use App\Http\Controllers\Auths\RegisterController;
use App\Http\Controllers\forgetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function () {

    #Login
    Route::get('/login', [loginController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->name('loginOnValidate');

    #Register
    Route::get('/register', [RegisterController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'Register'])->name('registerOnValidate');

    #Login dan Register dengan Google
    Route::get('/auth/google', [loginController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::any('/auth/google/callback', [loginController::class, 'handleGoogleCallback'])->name('GoogleCallback');

    #Forget dan Reset Password
    Route::get('/forgetPassword',[forgetPasswordController::class,'forgetPasswordForm'])->name('forgetPasswordForm');
    Route::post('/forgetPassword',[forgetPasswordController::class,'forgetPassword'])->name('forgetPassword');
    Route::get('/resetPassword',[forgetPasswordController::class, 'resetPasswordForm'])->name('resetPasswordForm');
    Route::post('/resetPassword',[forgetPasswordController::class, 'resetPassword'])->name('resetPassword');

});



Route::group(['middleware' => 'auth',], function () {

    #Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    #Post dan CRUD
    Route::post('/post/create' , [HomeController::class , 'store'])->name('storePost');
    Route::get('/post/edit/{id}', [HomeController::class, 'edit'])->name('editPost');
    Route::patch('/post/update/{id}', [HomeController::class, 'update'])->name('postUpdate');
    Route::get('/post/delete/{id}', [HomeController::class, 'destroy'])->name('deletePost');

    #Log out
    Route::get('/logout', [logoutController::class, 'logout'])->name('logout');

    #Profile dan CRUD
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::post('/comment/{id}' , [ActionController::class,'comment'])->name('commentSubmit');

    Route::post('/like/{id}', [ActionController::class, 'like'])->name('like');
    Route::delete('/like/{id}', [ActionController::class, 'unlike'])->name('unlike');

});

// Route::get('/like-button/{postId}', LikeButton::class);

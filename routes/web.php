<?php

use App\Http\Controllers\Auths\loginController;
use App\Http\Controllers\Auths\logoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auths\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\LikeButton;

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

    Route::get('/login', [loginController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->name('loginOnValidate');
    Route::get('/register', [RegisterController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'Register'])->name('registerOnValidate');


});



Route::group(['middleware' => 'auth'], function () {

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [logoutController::class, 'logout'])->name('logout');

});

// Route::get('/like-button/{postId}', LikeButton::class);

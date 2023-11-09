<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'home'])->name('home');
Route::match(['GET','POST'],'/login',[UserController::class, 'login'])->name('login');
Route::match(['GET','POST'],'/register',[UserController::class, 'register'])->name('register');
Route::get('/profile',[UserController::class, 'profile'])->name('profile');
Route::match(['GET','POST'],'/edit-profile',[UserController::class, 'editProfile'])->name('edit-profile');
Route::match(['GET','POST'],'/sign-out',[UserController::class, 'signOut'])->name('sign-out');
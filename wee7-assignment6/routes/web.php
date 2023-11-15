<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'home'])->name('home');
Route::get('/login',[UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/register',[UserController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register',[UserController::class, 'register'])->name('register');

// profile route
Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/{id}/edit',[ProfileController::class, 'editProfile'])->name('editProfile');
Route::patch('/profile/{id}/update',[ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::match(['GET','POST'],'/sign-out',[ProfileController::class, 'signOut'])->name('sign-out');

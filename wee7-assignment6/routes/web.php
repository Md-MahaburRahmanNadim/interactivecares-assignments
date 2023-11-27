<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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


// Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::get('/login',[UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/register',[UserController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register',[UserController::class, 'register'])->name('register');

// profile route
Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/{id}/edit',[ProfileController::class, 'editProfile'])->name('editProfile');
Route::patch('/profile/{id}/update',[ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::match(['GET','POST'],'/sign-out',[ProfileController::class, 'signOut'])->name('sign-out');


// post route
Route::get('/',[PostController::class, 'index'])->name('home');

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('comments', CommentController::class)->middleware('auth');


// require __DIR__.'/auth.php';
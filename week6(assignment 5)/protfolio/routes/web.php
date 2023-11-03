<?php

use App\Http\Controllers\ProtfolioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProtfolioController::class, 'home'])->name('home');
Route::get('/experience', [ProtfolioController::class, 'experience'])->name('experience');
Route::get('/experience/{skill}', [ProtfolioController::class,'singleExperience'])->name('singleExperience');
Route::get('/projects', [ProtfolioController::class, 'projects'])->name('projects');
Route::get('/projects/{projectName}',[ProtfolioController::class,'singleProject'])->name('singleProject');
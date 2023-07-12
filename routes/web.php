<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::resource('blog',PostController::class)
                ->only(['index','show', 'store', 'edit','create','update', 'destroy'])
                ->middleware(['auth', 'verified']);



Route::get('/',[UserController::class,'register'])->middleware('guest')->name('registration');

Route::post('/store',[UserController::class,'store'])->name('store')->middleware('auth');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/authentification',[UserController::class,'authentification'])->name('authentification')->middleware('guest');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

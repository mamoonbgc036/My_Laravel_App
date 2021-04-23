<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;

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

Route::get('/post', [ PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);

Route::get('/home', [ HomeController::class, 'index'] )->name('home');

Route::post('/logout', [ LogoutController::class, 'store'] )->name('logout');

Route::get('/register', [ RegisterController::class, 'index'])->name('register');
Route::post('/register', [ RegisterController::class, 'store']);

Route::get('/login', [ LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/post/{post}/likes', [PostLikesController::class, 'store'])->name('post.likes');

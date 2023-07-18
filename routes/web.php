<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\CommentController;


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

Route::get('/', function () {
    return view('welcome');
});
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/post/{post}', [HomeController::class, 'show'])->name('post');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
        Route::get('/register', [UserController::class, 'create'])->name('register');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('posts', PostController::class);
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
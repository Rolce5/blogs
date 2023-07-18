<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/home', [HomeController::class, 'index'])->name('api.home');
Route::get('/post/{post}', [HomeController::class, 'show'])->name('post');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'store']);
Route::post('/comment', [CommentController::class, 'store'])->name('comments');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [UserController::class, 'create'])->name('register');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('posts', PostController::class);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

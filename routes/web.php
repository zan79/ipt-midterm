<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landingView');
});

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verification/{user}/{token}', [AuthController::class, 'verify']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [PostController::class, 'displayDashboard']);
    Route::post('/newpost', [PostController::class, 'storePost']);
    Route::get('/users', [PostController::class, 'showUsers']);
    Route::get('/user/{id}', [PostController::class, 'showPostByUser']);
    Route::get('/categories/{category}', [PostController::class, 'showPostByCategory']);
});

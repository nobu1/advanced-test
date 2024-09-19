<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});


// Auth Page
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/thanks', [AuthController::class, 'thanks']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

// Admin Page
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AdminController::class, 'index'])->name('admin.index');
});
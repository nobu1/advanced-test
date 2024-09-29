<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Page
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('index.detail');
Route::post('/', [ShopController::class, 'search'])->name('index.search');
Route::middleware('auth')->group(function () {
    Route::get('/favorite/add/{favorite}', [ShopController::class, 'addFavorite'])->name('index.addFavorite');
    Route::get('/favorite/delete/{favorite}', [ShopController::class, 'deleteFavorite'])->name('index.deleteFavorite');
    Route::post('/detail/{shop_id}', [ShopController::class, 'reserve'])->name('index.reserve');
});

// Auth Page
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/thanks', [AuthController::class, 'thanks']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

// My Page
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AdminController::class, 'index'])->name('admin.index');

    // For Reservations model
    // Route::get('/mypage/reservation', [AdminController::class, 'indexReservation'])->name('reservation.index');
    Route::get('/mypage/reservation/{reservation}', [AdminController::class, 'showReservation'])->name('reservation.show');
    Route::patch('/mypage/reservation/{reservation}', [AdminController::class, 'changeReservation'])->name('reservation.change');
    
    // For Restaurants model
    Route::get('/mypage/restaurant', [AdminController::class, 'indexRestaurant'])->name('restaurant.index');
    Route::get('/mypage/restaurant/create', [AdminController::class, 'createRestaurant'])->name('restaurant.create');
    Route::post('/mypage/restaurant/create', [AdminController::class, 'storeRestaurant'])->name('restaurant.store');
    Route::get('/mypage/restaurant/{restaurant}', [AdminController::class, 'showRestaurant'])->name('restaurant.show');
    Route::get('/mypage/restaurant/{restaurant}/edit', [AdminController::class, 'editRestaurant'])->name('restaurant.edit');
    Route::patch('/mypage/restaurant/{restaurant}', [AdminController::class, 'updateRestaurant'])->name('restaurant.update');
    Route::delete('/mypage/restaurant/{restaurant}', [AdminController::class, 'destroyRestaurant'])->name('restaurant.destroy');

    
});
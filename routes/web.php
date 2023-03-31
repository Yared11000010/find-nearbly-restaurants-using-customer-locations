<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware(['auth','throttle:3,1'])->group(function(){
    Route::get('add_resturant',[RestaurantController::class,'create'])->name('addresturant');
    Route::post('store_resturant',[RestaurantController::class,'addresturant'])->name('store_resturant');
    Route::get('/restaurants/nearby', [RestaurantController::class, 'getNearestRestaurants'])->name('restaurants.nearby');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
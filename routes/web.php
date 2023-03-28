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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('displayform',[RestaurantController::class,'displayform'])->name('display-form');
Route::get('/restaurants/nearby', [RestaurantController::class, 'getNearestRestaurants'])->name('restaurants.nearby');
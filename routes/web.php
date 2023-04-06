<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\LoginRegisterController;
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
    return view('loginandregister.login_register');
});

Auth::routes();

//for protect DDOS attack 
Route::middleware(['auth','throttle:3,1'])->group(function(){
   
   

});

//routing for resturant
Route::get('add_resturant',[RestaurantController::class,'create'])->name('addresturant');
Route::post('store_resturant',[RestaurantController::class,'addresturant'])->name('store_resturant');
Route::get('/restaurants/nearby', [RestaurantController::class, 'getNearestRestaurants'])->name('restaurants.nearby');

//routing for users
Route::get('login_register',[LoginRegisterController::class,'display'])->name('login_register');
Route::post('/login_user', [LoginRegisterController::class,'login']);
Route::post('/register_user', [LoginRegisterController::class,'register']);
Route::post('/logout_user', [LoginRegisterController::class,'logout'])->name('logout_user');

//for Foods
Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');
Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::get('/home', [RestaurantController::class, 'getNearestRestaurants'])->name('home');

//for OTP 
Route::get('sendSMS', [App\Http\Controllers\TwilioSMSController::class, 'index']);

Route::get('foodorders',[FoodOrderController::class,'index'])->name('foodorders');
Route::post('food-orders',[FoodOrderController::class,'create'])->name('food-orders');
Route::post('assing/{orderId}',[FoodOrderController::class,'assign'])->name('assign');
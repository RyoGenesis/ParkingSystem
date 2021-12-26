<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParkingDataController;
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
//homepage routes
Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'index'])->name('home');

//parking routes
Route::get('/park-vehicle', [HomeController::class,'parkIndex'])->name('park-vehicle');
Route::post('/parkVehicle', [ParkingDataController::class,'park']);

//checkout routes
Route::get('/checkout', [HomeController::class,'checkoutIndex'])->name('checkout');
Route::post('/checkoutVehicle', [ParkingDataController::class,'checkout']);

//auth route
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

//admin related routes
Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/', [AdminController::class,'index']);
    Route::middleware('auth')->group(function(){
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('.dashboard');
        Route::get('/report', [AdminController::class,'reportIndex'])->name('.report');
        Route::get('/report/all', [AdminController::class,'all'])->name('.report.all');
        Route::get('/report/range-from', [AdminController::class,'fromDate'])->name('.report.range');
        Route::get('/profile', [AdminController::class,'profileIndex'])->name('.profile');
    });
});

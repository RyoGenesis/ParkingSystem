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
//middleware must not be authenticated to access
Route::middleware('guest')->group(function () {
    //homepage routes
    Route::get('/', [HomeController::class,'index']);
    Route::get('/home', [HomeController::class,'index'])->name('home');
    
    //parking routes
    Route::get('/park-vehicle', [HomeController::class,'parkIndex'])->name('park-vehicle');
    Route::post('/parkVehicle', [ParkingDataController::class,'park']);
    
    //checkout routes
    Route::get('/checkout', [HomeController::class,'checkoutIndex'])->name('checkout');
    Route::get('/checkout-detail', [HomeController::class,'detail'])->name('checkout-detail');
    Route::post('/checkoutVehicle', [ParkingDataController::class,'checkout']);

    //checking code routes
    Route::post('/checkCode', [ParkingDataController::class,'check']);
    Route::get('/check-code', [HomeController::class,'check'])->name('check-code');
});

//auth route
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

//admin related routes
Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/', [AdminController::class,'index'])->middleware('guest');
    Route::middleware('auth')->group(function(){
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('.dashboard');
        Route::get('/report', [AdminController::class,'reportIndex'])->name('.report');
        Route::get('/report/all', [ParkingDataController::class,'all'])->name('.report.all');
        Route::get('/report/range-from', [ParkingDataController::class,'fromDate'])->name('.report.range');
        Route::get('/profile', [AdminController::class,'profileIndex'])->name('.profile');
        Route::get('/profile/edit', [AdminController::class,'editIndex'])->name('.profile.edit');
        Route::post('/update', [AdminController::class,'update']);
        Route::get('/change-password', [AdminController::class,'changeIndex'])->name('.password');
        Route::post('/changepass', [AuthController::class,'changePassword']);
    });
});

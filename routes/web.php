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

Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/park-vehicle', [HomeController::class,'parkIndex'])->name('park-vehicle');
Route::post('/parkVehicle', [ParkingDataController::class,'park']);

Route::get('/checkout', [HomeController::class,'checkoutIndex']);
Route::post('/checkoutVehicle', [ParkingDataController::class,'checkout']);

Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/admin', [AdminController::class,'index']);
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/report', [AdminController::class,'reportIndex']);
Route::get('/admin/report/all', [AdminController::class,'all'])->name('admin.report.all');
Route::get('/admin/report/range-from', [AdminController::class,'fromDate'])->name('admin.report.range');

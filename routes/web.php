<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\JenisKerusakanController;

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
    return view('home');
});

// Route Authentication & Register
Route::resource('register', RegisterController::class);
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('login', [LoginController::class,'auth'])->name('auth');
Route::post('logout', [LogoutController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function (){

    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class,'profile'])->name('profile');
    Route::get('/profile/edit', [DashboardController::class,'edit'])->name('profile.edit');
    Route::post('/profile', [DashboardController::class,'update'])->name('profile.update');
    
    // Data Master
    // Route Member
    Route::resource('members', MemberController::class);
    // Route Mekanik
    Route::resource('mekanik', MekanikController::class);
    // Route Jenis Kerusakan
    Route::resource('jenis_kerusakan', JenisKerusakanController::class);
    
    // Data Repair
    // Route Kerusakan
    Route::resource('kerusakan', KerusakanController::class);
    // Route Kerusakan
    Route::resource('diagnosa', DiagnosaController::class);
    // Route Kerusakan
    Route::resource('perbaikan', PerbaikanController::class);
    
});

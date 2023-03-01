<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\ServiceController;
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
    
    // Route Perbaikan
    Route::resource('perbaikan', PerbaikanController::class);

    
    // Route Input Service  
    Route::controller(ServiceController::class)->group(function (){
        Route::get('service', 'index')->name('service.index');
        Route::get('service/kerusakan', 'kerusakan')->name('service.kerusakan');
        Route::post('service/kerusakan/store', 'storeKerusakan')->name('service.kerusakan.store');
        Route::get('service/diagnosa', 'diagnosa')->name('service.diagnosa');
        Route::post('service/diagnosa/store', 'storeDiagnosa')->name('service.diagnosa.store');
        Route::delete('service/diagnosa/destroy/{id}', 'destroy')->name('service.diagnosa.destroy');
        Route::get('service/mekanik', 'mekanik')->name('service.mekanik');
        Route::post('service/mekanik/store', 'storeMekanik')->name('service.mekanik.store');
        Route::post('service/status/{id}', 'upStatus')->name('service.status');
    });

});

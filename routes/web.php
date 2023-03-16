<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JenisKerusakanController;
use App\Http\Controllers\ListController;

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
    Route::post('/mekanik/acc', [DashboardController::class,'accMekanik'])->name('mekanik.acc');
    Route::post('/mekanik/eject', [DashboardController::class,'ejectMekanik'])->name('mekanik.eject');

    // Data Master
    // Route Member
    Route::resource('members', MemberController::class);
    // Route Mekanik
    Route::resource('mekanik', MekanikController::class);
    // Route Jenis Kerusakan
    Route::resource('jenis_kerusakan', JenisKerusakanController::class);

    // Route Perbaikan
    Route::controller(PerbaikanController::class)->group(function(){
        Route::get('perbaikan','index')->name('perbaikan.index');
        Route::get('perbaikan/invoice/{id}','invoice')->name('perbaikan.invoice');
        Route::get('perbaikan/detail/{id}','detail')->name('perbaikan.detail');
        Route::post('perbaikan/detail/{id}/create','createDetails');
        Route::post('perbaikan/detail/{id}/delete','deleteDetails');
        Route::post('perbaikan/statusPembayaran/{id}', 'upStatusPembayaran')->name('perbaikan.statusPembayaran');
        Route::post('perbaikan/statusPerbaikan/{id}', 'upStatusPerbaikan')->name('perbaikan.statusPerbaikan');
    });


    // Route Input Service
    Route::controller(ServiceController::class)->group(function (){
        Route::get('service', 'index')->name('service.index');
        Route::get('service/detail/{id}', 'detail')->name('service.detail');
        Route::post('service/delete/{id}', 'delete')->name('service.delete');
        Route::get('service/kerusakan/', 'kerusakan')->name('service.kerusakan');
        Route::post('service/kerusakan/store', 'storeKerusakan')->name('service.kerusakan.store');
        Route::get('service/diagnosa/{id}', 'diagnosa')->name('service.diagnosa');
        Route::post('service/diagnosa/store', 'storeDiagnosa')->name('service.diagnosa.store');
        Route::delete('service/diagnosa/destroy/{id}', 'destroy')->name('service.diagnosa.destroy');
        Route::get('service/mekanik/{id}', 'mekanik')->name('service.mekanik');
        Route::post('service/mekanik/store', 'storeMekanik')->name('service.mekanik.store');
        Route::post('service/statusPerbaikan/{id}', 'upStatusPerbaikan')->name('service.statusPerbaikan');
    });

    //Route untuk list Perbaikan
    Route::controller(ListController::class)->group(function(){
        Route::get('daftar-perbaikan','index')->name('list.index');
        Route::post('daftar-perbaikan/{id}','acc')->name('list.acc');
    });

    // Route untuk laporan
    Route::controller(LaporanController::class)->group(function(){
        Route::get('laporan', 'index')->name('laporan.index');
        Route::get('laporan/export', 'export')->name('laporan.export');
    });

});

Route::get('/exec', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
});

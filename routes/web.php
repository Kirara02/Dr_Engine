<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/personal', function () {
    return view('auth.personal');
});

Auth::routes();
// Data Master
// Route Member
Route::resource('members', MemberController::class);
// Route Mekanik
Route::resource('mekanik', MekanikController::class);
// Route Jenis Kerusakan
Route::resource('jenis-kerusakan', JenisKerusakanController::class);

// Data Repair
// Route Kerusakan
Route::resource('kerusakan', KerusakanController::class);
// Route Kerusakan
Route::resource('diagnosa', DiagnosaController::class);
// Route Kerusakan
Route::resource('perbaikan', PerbaikanController::class);

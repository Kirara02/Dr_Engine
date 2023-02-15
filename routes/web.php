<?php

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

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/member', function () {
    return view('member.index');
});
Route::get('/mekanik', function () {
    return view('mekanik.index');
});
Route::get('/perbaikan', function () {
    return view('perbaikan.index');
});
Route::get('/jeniskerusakan', function () {
    return view('jenisKerusakan.index');
});
Route::get('/pembayaran', function () {
    return view('pembayaran.index');
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
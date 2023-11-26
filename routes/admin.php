<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;


Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin', 'middleware'=>'guest:admin'], function(){
	Route::get('/admin-login', [LoginController::class, 'getLogin'])->name('admin.login');
	Route::post('/admin-login', [LoginController::class, 'postLogin'])->name('admin.login.post');
});


Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin', 'middleware'=>'auth:admin'], function(){
	Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
	Route::get('/logout', [DashboardController::class, 'logOut'])->name('admin.logout');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
Route::get('/', [HomeController::class, 'index']);

Route::get('login',[AuthController::class,'login'])->name('login');

Route::get('regist',[AuthController::class,'regist'])->name('regist');


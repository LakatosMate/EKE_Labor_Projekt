<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index']);
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('logging_in',[AuthController::class,'logging_in'])->name('logging_in');
Route::get('register',[RegistrationController::class,'register'])->name('register');
Route::post('registration',[RegistrationController::class,'registration'])->name('registration');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('profile',[ProfileController::class,'profile'])->name('profile')->middleware('auth');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('profile-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('logging_in',[AuthController::class,'logging_in'])->name('logging_in');
Route::get('register',[RegistrationController::class,'register'])->name('register');
Route::post('registration',[RegistrationController::class,'registration'])->name('registration');


Route::resource('post', PostController::class);
//Middlaware behozatala.

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('profile',[ProfileController::class,'profile'])->name('profile')->middleware('auth');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('profile-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');




Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::post('admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');


Route::post('password-change', [ProfileController::class, 'updatePassword'])->name('password.update');
Route::post('/profile/fullname/update', [ProfileController::class, 'updateFullName'])->name('profile.fullname.update');
Route::get('profile-picture-delete', [ProfileController::class, 'deleteProfilePicture'])->name('profile.picture.delete');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');


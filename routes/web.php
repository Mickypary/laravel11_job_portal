<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


/* Admin */

Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login__'])->name('admin_login__');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password__'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-password-submit', [AdminLoginController::class, 'reset_password__'])->name('admin_reset_password_submit');


Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');


// Route::group(['middleware' => 'admin:admin'], function () {
//     Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
//     Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin_settings');
//   });



/* Home */
Route::get('/', [HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;


use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobCategoryController;
use App\Http\Controllers\Frontend\TermsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


/* Admin */


Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login__'])->name('admin_login__');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password__'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-password-submit', [AdminLoginController::class, 'reset_password__'])->name('admin_reset_password_submit');


Route::middleware(['admin:admin'])->group(function () {

  // Dashboard/Profile
  Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin_dashboard');
  Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
  Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
  Route::get('admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
  Route::post('admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');


  // Job Category
  Route::get('admin/job-category/view', [AdminJobCategoryController::class, 'index'])->name('admin_job_category');
  Route::get('admin/job-category/add', [AdminJobCategoryController::class, 'add'])->name('admin_job_category_add');
  Route::post('admin/job-category/store', [AdminJobCategoryController::class, 'store'])->name('admin_job_category_store');
  Route::get('admin/job-category/edit/{id}', [AdminJobCategoryController::class, 'edit'])->name('admin_job_category_edit');
  Route::post('admin/job-category/update/{id}', [AdminJobCategoryController::class, 'update'])->name('admin_job_category_update');
  Route::get('admin/job-category/delete/{id}', [AdminJobCategoryController::class, 'delete'])->name('admin_job_category_delete');


  // Why Choose Us
  Route::get('admin/why-choose/view', [AdminWhyChooseController::class, 'index'])->name('admin_why_choose');
  Route::get('admin/why-choose/add', [AdminWhyChooseController::class, 'add'])->name('admin_why_choose_add');
  Route::post('admin/why-choose/store', [AdminWhyChooseController::class, 'store'])->name('admin_why_choose_store');
  Route::get('admin/why-choose/edit/{id}', [AdminWhyChooseController::class, 'edit'])->name('admin_why_choose_edit');
  Route::post('admin/why-choose/update/{id}', [AdminWhyChooseController::class, 'update'])->name('admin_why_choose_update');
  Route::get('admin/why-choose/delete/{id}', [AdminWhyChooseController::class, 'delete'])->name('admin_why_choose_delete');
});

// Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');



// Route::group(['middleware' => 'admin:admin'], function () {
//     Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
//     Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin_settings');
//   });



/* Frontend */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('terms', [TermsController::class, 'index'])->name('terms');
Route::get('job-categories', [JobCategoryController::class, 'categories'])->name('job_categories');

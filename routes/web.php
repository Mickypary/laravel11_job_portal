<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFaqPageController;
use App\Http\Controllers\Admin\AdminBlogPageController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminJobCategoryPageController;
use App\Http\Controllers\Admin\AdminPackageController;


// Frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobCategoryController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\ContactController;


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

  // Dashboard/Profile/Homepage
  Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin_dashboard');
  Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
  Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');


  // Admin Homepage
  Route::get('admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
  Route::post('admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');


  // Admin FAQ Page
  Route::get('admin/faq-page', [AdminFaqPageController::class, 'index'])->name('admin_faq_page');
  Route::post('admin/faq-page/update', [AdminFaqPageController::class, 'update'])->name('admin_faq_page_update');


  // Admin Blog Page
  Route::get('admin/blog-page', [AdminBlogPageController::class, 'index'])->name('admin_blog_page');
  Route::post('admin/blog-page/update', [AdminBlogPageController::class, 'update'])->name('admin_blog_page_update');


  // Admin Term Page
  Route::get('admin/term-page', [AdminTermPageController::class, 'index'])->name('admin_term_page');
  Route::post('admin/term-page/update', [AdminTermPageController::class, 'update'])->name('admin_term_page_update');


  // Admin Privacy Page
  Route::get('admin/privacy-page', [AdminPrivacyPageController::class, 'index'])->name('admin_privacy_page');
  Route::post('admin/privacy-page/update', [AdminPrivacyPageController::class, 'update'])->name('admin_privacy_page_update');



  // Admin Contact Page
  Route::get('admin/contact-page', [AdminContactPageController::class, 'index'])->name('admin_contact_page');
  Route::post('admin/contact-page/update', [AdminContactPageController::class, 'update'])->name('admin_contact_page_update');


  // Admin Job Category Page
  Route::get('admin/job-category-page', [AdminJobCategoryPageController::class, 'index'])->name('admin_job_category_page');
  Route::post('admin/job-category-page/update', [AdminJobCategoryPageController::class, 'update'])->name('admin_job_category_page_update');


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


  // Testimonials
  Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial');
  Route::get('admin/testimonial/add', [AdminTestimonialController::class, 'add'])->name('admin_testimonial_add');
  Route::post('admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
  Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
  Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
  Route::get('admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');


  // Post
  Route::get('admin/post/view', [AdminPostController::class, 'index'])->name('admin_post');
  Route::get('admin/post/add', [AdminPostController::class, 'add'])->name('admin_post_add');
  Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
  Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
  Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
  Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');



  // FAQs
  Route::get('admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq');
  Route::get('admin/faq/add', [AdminFaqController::class, 'add'])->name('admin_faq_add');
  Route::post('admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
  Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
  Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
  Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');


  // Package
  Route::get('admin/package/view', [AdminPackageController::class, 'index'])->name('admin_package');
  Route::get('admin/package/add', [AdminPackageController::class, 'add'])->name('admin_package_add');
  Route::post('admin/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
  Route::get('admin/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
  Route::post('admin/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
  Route::get('admin/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin_package_delete');
});

// Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');



// Route::group(['middleware' => 'admin:admin'], function () {
//     Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
//     Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin_settings');
//   });



/* Frontend */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('terms-of-use', [TermsController::class, 'index'])->name('terms');
Route::get('job-categories', [JobCategoryController::class, 'categories'])->name('job_categories');
Route::get('blog', [PostController::class, 'index'])->name('blog');
Route::get('post/{slug}', [PostController::class, 'detail'])->name('post');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/submit', [ContactController::class, 'store'])->name('contact.store');

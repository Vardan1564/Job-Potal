<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\jobPostController;
use App\Http\Controllers\signupProcessController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
// ---------------------- test Router ---------------------------

// admin
Route::get('/admin', function () {
    return view('Admin.AdminDashboard');
})->name("admin");

//Company
Route::get('/company', function () {
    return view('Company.companyDashboard');
})->name('company');

//user 
Route::get('/user', function () {
    return view('User.userDashboard');
})->name('user');

//about-Us page
Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

//index page
Route::get('/index', function () {
    return view('index');
})->name('index');


// ----------------------------------------------------

// view sign - up page
Route::get('/signup',[signupProcessController::class,'signup'])->name('signUp');

// view sign-in page
Route::get('/signin',[signupProcessController::class,'signin'])->name('signin');

// store sign-up 
Route::post('signup/save',[signupProcessController::class,'storeUser'])->name('signup_save');

// login Process
Route::post('login',[authController::class,'loginProcess'])->name('login');

// profile
Route::get("profile", [authController::class, "profile"])->name("profile");

//company profile
Route::get('company_profile',[CompanyController::class,'Cprofile'])->name('Cprofile');

//edit company page
Route::get('edit/companyProfile',[CompanyController::class,'companyEditProfile'])->name('CEditProfile');

//edit Company Profile save 
Route::post('Cprofile/save',[CompanyController::class,'edit_save_profile'])->name('CprofileSave');

// job seeker
Route::get('/edit/seekerProfile',[userController::class,'seekerEditProfile'])->name('seekerEditProfile');

// job update save
Route::post('/profile/updated',[userController::class,'seeker_edit_save'])->name('seekerUpdate');

// view Contact Us Page
Route::get('/Contact-Us',[contactUsController::class,'contactUs'])->name('contactUs');

// store contact form data
Route::post('/Contact-Us',[contactUsController::class,'storeContact'])->name('contactUs.store');

// view job post page
Route::get('/jobpost',[jobPostController::class,'jobpost'])->name('jobpost');

//save job post data
Route::post('/jobpost/save',[jobPostController::class,'jobpost_save'])->name('jobpost_save');
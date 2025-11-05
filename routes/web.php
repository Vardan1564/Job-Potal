<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\jobPostController;
use App\Http\Controllers\signupProcessController;
use App\Http\Controllers\userController;
use App\Http\Controllers\internshipsController;
use App\Http\Controllers\adminAllOprationController;
use App\Http\Controllers\applyJobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
// ---------------------- test Router ---------------------------

// admin
Route::get('/admin', function () {
    return view('Admin.adminDashboard');
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

// list job posts
Route::get('/job-listings',[jobPostController::class,'list_jobs'])->name('jobListings');

// company(loged in) job posts
Route::get('/your-jobs',[jobPostController::class,'company_jobs'])->name('companyJobs');

// all company jobs for company 
Route::get('/all-company-jobs',[jobPostController::class,'list_jobs_for_company_page'])->name('allCompanyJobs');

// internships page
Route::get('/internships',[internshipsController::class,'showInternships'])->name('internships');

// job detail page
Route::get('/job-detail/{id}',[jobPostController::class,'job_detail'])->name('jobDetail');

//admin dashboard
// Route::get('/admin/dashboard',[adminAllOprationController::class,'dashboard'])->name('admin');

//admin users management
Route::get('/admin/manage-users',[adminAllOprationController::class,'manageUsers'])->name('adminManageUsers'); 

//admin companies management
Route::get('/admin/manage-companies',[adminAllOprationController::class,'manageCompanies'])->name('adminManageCompanies');

//admin jobs management
Route::get('/admin/manage-jobs',[adminAllOprationController::class,'manageJobs'])->name('adminManageJobs');

//admin analysis
Route::get('/admin/analysis',[adminAllOprationController::class,'analysis'])->name('adminAnalysis');

//apply job
Route::get('/apply/job/{j_id}/{c_id}/{company_name}/{job_title}/{city}/{state}',[applyJobController::class,'apply'])->name('applyJob');

//user job applications list
Route::get('/user/applications',[applyJobController::class,'applicationsList'])->name('userApplicationsList');

// applicatants for a job post
Route::get('/company/applicants/{id}',[jobPostController::class,'viewApplicants'])->name('viewApplicants');

//view applicants profile
Route::get('/company/applicant/profile/{id}',[applyJobController::class,'applicantProfile'])->name('applicantProfile');

//admin applications management
Route::get('/admin/manage-applications',[adminAllOprationController::class,'manageApplications'])->name('adminManageApplications');
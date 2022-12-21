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

// Route::get('welcome', function () {
//     return view('welcome');
// });

Auth::routes();

//---------------------- frontend router--------------------------------

#------------------------------ home page -----------------------
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'create'])->name('home');
#-------------------------- journal search -------------
Route::get('journal_search', [App\Http\Controllers\Frontend\HomeController::class, 'journal_search'])->name('journal_search');

#--------------------------Single  journal Show -------------
Route::get('single_journal_Show/{id}', [App\Http\Controllers\Frontend\Single_JournalController::class,'show'])->name('single_journal_Show');

#--------------------------Journal type Show -------------
Route::get('journal_type_Show/{id}', [App\Http\Controllers\Frontend\Journal_TypeController::class,'show'])->name('journal_type_Show');

#------------------------- contact page -------------------
Route::get('contact_page', [App\Http\Controllers\Frontend\ContactController::class,'create'])->name('contact_page');
Route::post('contact_store', [App\Http\Controllers\Frontend\ContactController::class,'store'])->name('contact_store');

#------------------------- contact page -------------------
Route::get('about_page', [App\Http\Controllers\Frontend\AboutController::class,'create'])->name('about_page');


#---------------------- admin router -----------------------
Route::group(['prefix' => 'admin'], function () {
#----------------------------admin login --------------------
Route::get('login_page', [App\Http\Controllers\Admin\LoginController::class, 'create'])->name('login_page');
Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

#---------------------------- password -------------------
// Route::get('email_send', [App\Http\Controllers\Admin\password\ResetPasswordController::class, 'create'])->name('email_send');
// Route::get('reset_pass', [App\Http\Controllers\Admin\password\ResetPasswordController::class, 'index'])->name('reset_pass');

#----------------------------- account ----------------------
Route::get('create_admin', [App\Http\Controllers\Admin\AccountController::class, 'create'])->name('create_admin');
Route::post('store_admin', [App\Http\Controllers\Admin\AccountController::class, 'store'])->name('store_admin');
Route::get('user_manage', [App\Http\Controllers\Admin\AccountController::class, 'index'])->name('user_manage');
Route::get('user_destroy/{id}', [App\Http\Controllers\Admin\AccountController::class, 'destroy'])->name('user_destroy');

Route::get('user_status_update/{id}', [App\Http\Controllers\Admin\AccountController::class, 'user_status_update'])->name('user_status_update');

#------------------------- adminInformation router-------------------
Route::get('show_profile',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'admin_profile'])->name('show_profile');
Route::get('create_information',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'create'])->name('create_information');
Route::post('store_information',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'store'])->name('store_information');
Route::get('manage_information',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'index'])->name('manage_information');
Route::get('edit_information/{id}',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'edit'])->name('edit_information');
Route::post('update_information/{id}',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'update'])->name('update_information');
Route::get('destroy_information/{id}',[App\Http\Controllers\Admin\Dashboard\AdminInformationController::class, 'destroy'])->name('destroy_information');

#-------------------------- home------------------------------
Route::get('home', [App\Http\Controllers\Admin\Dashboard\HomeController ::class, 'index'])->name('home');
#------------------------- journal_type --------------------
Route::get('create_journal_type',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'create'])->name('create_journal_type');
Route::post('store_journal_type',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'store'])->name('store_journal_type');
Route::get('manage_journal_type',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'index'])->name('manage_journal_type');
Route::get('edit_journal_type/{id}',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'edit'])->name('edit_journal_type');
Route::post('update_journal_type/{id}',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'update'])->name('update_journal_type');
Route::get('destroy_journal_type/{id}',[App\Http\Controllers\Admin\Dashboard\Journal_TypeController::class,'destroy'])->name('destroy_journal_type');
#------------------------- journal -----------------------
Route::get('create_journal',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'create'])->name('create_journal');
Route::post('store_journal',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'store'])->name('store_journal');
Route::get('manage_journal',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'index'])->name('manage_journal');
Route::get('journal_status_update/{id}',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'journal_status_update'])->name('journal_status_update');
Route::get('show_pdf/{id}',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'show_pdf'])->name('show_pdf');
Route::get('destroy_journal/{id}',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'destroy'])->name('destroy_journal');
Route::get('edit_journal/{id}',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'edit'])->name('edit_journal');
Route::post('update_journal/{id}',[App\Http\Controllers\Admin\Dashboard\JournalController::class,'update'])->name('update_journal');

#--------------------------------- Comment Manage --------------
Route::get('comment_manage',[App\Http\Controllers\Admin\CommentController::class,'index'])->name('comment_manage');
Route::get('comment_edit/{id}',[App\Http\Controllers\Admin\CommentController::class,'edit'])->name('comment_edit');
Route::post('comment_update/{id}',[App\Http\Controllers\Admin\CommentController::class,'update'])->name('comment_update');
Route::get('comment_destroy/{id}',[App\Http\Controllers\Admin\CommentController::class,'destroy'])->name('comment_destroy');

#------------------------------------ Contact ----------------------------------
Route::get('contact_manage',[App\Http\Controllers\Admin\Dashboard\ContactController::class,'index'])->name('contact_manage');
Route::get('contact_edit/{id}',[App\Http\Controllers\Admin\Dashboard\ContactController::class,'edit'])->name('contact_edit');
Route::post('contact_update/{id}',[App\Http\Controllers\Admin\Dashboard\ContactController::class,'update'])->name('contact_update');
Route::get('contact_destroy/{id}',[App\Http\Controllers\Admin\Dashboard\ContactController::class,'destroy'])->name('contact_destroy');

});

#---------------------- reviewer router -----------------------
Route::group(['prefix' => 'reviewer'], function () {
    
#------------------------- Account ------------------------
Route::get('registraion_page',[App\Http\Controllers\Reviewer\RegistrationController::class,'create'])->name('registraion_page');
Route::post('registraion',[App\Http\Controllers\Reviewer\RegistrationController::class,'store'])->name('registraion');

Route::get('login_page',[App\Http\Controllers\Reviewer\LoginController::class,'create'])->name('login_page');
Route::post('login',[App\Http\Controllers\Reviewer\LoginController::class,'store'])->name('login');

Route::get('logout',[App\Http\Controllers\Reviewer\LoginController::class,'logout'])->name('logout');
#------------------------- Reviewer Information ------------------------
Route::get('profile_page',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'show'])->name('profile_page');

Route::get('create_profile',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'create'])->name('create_profile');
Route::post('store_profile',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'store'])->name('store_profile');
Route::get('edit_profile_page/{id}',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'edit'])->name('edit_profile_page');
Route::post('update_profile_page/{id}',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'update'])->name('update_profile_page');
Route::get('manage_profile',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'index'])->name('manage_profile');
Route::get('destroy_profile/{id}',[App\Http\Controllers\Reviewer\Dashboard\ReviewerInformationController::class,'destroy'])->name('destroy_profile');
#------------------------- Journal  -------------------------
Route::get('create_journal',[App\Http\Controllers\Reviewer\Dashboard\JournalController::class,'create'])->name('create_journal');
Route::post('store_journal',[App\Http\Controllers\Reviewer\Dashboard\JournalController::class,'store'])->name('store_journal');
Route::get('manage_journal',[App\Http\Controllers\Reviewer\Dashboard\JournalController::class,'index'])->name('manage_journal');
Route::get('show_pdf/{id}',[App\Http\Controllers\Reviewer\Dashboard\JournalController::class,'show'])->name('show_pdf');
});


#---------------------- auth router -----------------------
Route::group(['prefix' => 'auth'], function () {
#------------------------- registration --------------------
Route::get('registration_page',[App\Http\Controllers\Auth\RegisterController::class,'create'])->name('registration_page');
Route::post('registration_store',[App\Http\Controllers\Auth\RegisterController::class,'store'])->name('registration_store');
#---------------------- login -------------------------
Route::get('login_page',[App\Http\Controllers\Auth\LoginController::class,'create'])->name('login_page');
Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'store'])->name('login');
#------------------- logout --------------------------------
Route::get('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
#----------------------- password change success messege ---------
Route::get('pass_success',[App\Http\Controllers\Auth\LoginController::class,'pass_success'])->name('pass_success');
#--------------------------------- auth information -----------------------
Route::get('show_profile',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'show'])->name('show_profile');
Route::get('create_profile',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'create'])->name('create_profile');
Route::post('store_profile',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'store'])->name('store_profile');
Route::get('manage_profile',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'index'])->name('manage_profile');
Route::get('edit_profile/{id}',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'edit'])->name('edit_profile');
Route::post('update_profile/{id}',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'update'])->name('update_profile');
Route::get('destroy_profile/{id}',[App\Http\Controllers\Auth\Dashboard\AuthInformationControler::class,'destroy'])->name('destroy_profile');
#--------------------------------- journal  ------------------------
Route::get('create_journal',[App\Http\Controllers\Auth\Dashboard\journalController::class,'create'])->name('create_journal');
Route::post('store_journal',[App\Http\Controllers\Auth\Dashboard\journalController::class,'store'])->name('store_journal');
Route::get('manage_journal',[App\Http\Controllers\Auth\Dashboard\journalController::class,'index'])->name('manage_journal');
Route::get('show_journal/{id}',[App\Http\Controllers\Auth\Dashboard\journalController::class,'show'])->name('show_journal');


});

//--------------------- comment router ---------------------
Route::group(['middleware'=>['auth']], function (){
  Route::post('comment_store/{journal_id}',[App\Http\Controllers\Admin\CommentController::class,'store'])->name('comment_store');
});

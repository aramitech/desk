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
//USER
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'store'])->name('users.add');
Route::post('/users/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::post('/users/delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
Route::post('/users/updaterole', [App\Http\Controllers\UsersController::class, 'updaterole'])->name('users.updaterole');
Route::get('/users/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
Route::post('/users/updatepassword', [App\Http\Controllers\UsersController::class, 'updatepassword'])->name('users.updatepassword');



// ADMIN
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'loginView'])->name('admin-login');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin-login');
Route::any('/admin-logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin-logout');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin-dashboard');
// SUPER ADMIN
Route::get('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'loginView'])->name('super-admin-login');
Route::post('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'login'])->name('super-admin-login');
Route::any('/super-admin-logout', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'logout'])->name('super-admin-logout');

Route::get('/super-admin/dashboard', [App\Http\Controllers\SuperAdminController::class, 'dashboard'])->name('super-admin-dashboard');


Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::post('/company/add', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.add');
Route::post('/company/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::post('/company/delete', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.delete');
Route::get('/company/bookmarkers', [App\Http\Controllers\CompanyController::class, 'bookmarkers'])->name('company.bookmarkers');
Route::post('/company/addbookmarkers', [App\Http\Controllers\CompanyController::class, 'addbookmarkers']);
Route::get('/company/publickgaming', [App\Http\Controllers\CompanyController::class, 'publickgaming'])->name('company.publickgaming');
Route::post('/company/addpublicgaming', [App\Http\Controllers\CompanyController::class, 'addpublicgaming'])->name('company.addpublicgaming');

Route::post('/company/delete_destroybookmarkerscompany', [App\Http\Controllers\CompanyController::class, 'destroybookmarkerscompany'])->name('company.delete_destroybookmarkerscompany');
Route::post('/company/delete_destroypublicgamingcompany', [App\Http\Controllers\CompanyController::class, 'destroypublicgamingcompany'])->name('company.delete_destroypublicgamingcompany');
Route::post('/company/delete_destroypubliclottery', [App\Http\Controllers\CompanyController::class, 'destroypubliclottery'])->name('company.delete_destroypubliclottery');


Route::get('/bookmarkers', [App\Http\Controllers\BookMarkersController::class, 'index'])->name('bookmarkers');
Route::post('/bookmarkers/add', [App\Http\Controllers\BookMarkersController::class, 'store'])->name('bookmarkers.add');
Route::post('/bookmarkers/update', [App\Http\Controllers\BookMarkersController::class, 'update'])->name('bookmarkers.update');
Route::post('/bookmarkers/delete', [App\Http\Controllers\BookMarkersController::class, 'destroy'])->name('bookmarkers.delete');
Route::get('/license_name/get',[App\Http\Controllers\BookMarkersController::class, 'getLicenseeName']);

Route::get('/addbookmarkers',[App\Http\Controllers\BookMarkersController::class, 'addbookmarkers'])->name('bookmarkers.addbookmarkers');


Route::get('/adminbookmarkers', [App\Http\Controllers\AdminBookMarkersController::class, 'index'])->name('adminbookmarkers');
Route::get('/adminpublicgaming', [App\Http\Controllers\AdminPublicgamingsController::class, 'index'])->name('adminpublicgaming');

Route::get('/adminpubliclottery', [App\Http\Controllers\AdminPublicLotteryController::class, 'index'])->name('adminpubliclottery');


Route::get('/publiclottery', [App\Http\Controllers\PublicLotteryController::class, 'index'])->name('publiclottery');
Route::post('/publiclottery/add', [App\Http\Controllers\PublicLotteryController::class, 'store'])->name('publiclottery.add');
Route::post('/publiclottery/update', [App\Http\Controllers\PublicLotteryController::class, 'update'])->name('publiclottery.update');
Route::post('/publiclottery/delete', [App\Http\Controllers\PublicLotteryController::class, 'destroy'])->name('publiclottery.delete');
Route::get('/publiclottery_license_name/get',[App\Http\Controllers\PublicLotteryController::class, 'getLicenseeName']);

Route::get('/publicgaming', [App\Http\Controllers\PublicgamingsController::class, 'index'])->name('publicgaming');
Route::post('/publicgaming/add', [App\Http\Controllers\PublicgamingsController::class, 'store'])->name('publicgaming.add');
Route::post('/publicgaming/update', [App\Http\Controllers\PublicgamingsController::class, 'update'])->name('publicgaming.update');
Route::post('/publicgaming/delete', [App\Http\Controllers\PublicgamingsController::class, 'destroy'])->name('publicgaming.delete');
Route::get('/publicgaming_license_name/get',[App\Http\Controllers\PublicgamingsController::class, 'getLicenseeName']);

Route::get('/admin_users', [App\Http\Controllers\AdminuserController::class, 'index'])->name('admin_users');
Route::post('/admin_users/add', [App\Http\Controllers\AdminuserController::class, 'store'])->name('admin_users.add');
Route::post('/admin_users/update', [App\Http\Controllers\AdminuserController::class, 'update'])->name('admin_users.update');
Route::post('/admin_users/delete', [App\Http\Controllers\AdminuserController::class, 'destroy'])->name('admin_users.delete');


Route::get('/return_form_rports/publiclottery', [App\Http\Controllers\ReturnFormReportsController::class, 'publiclottery'])->name('return_form_rports.publiclottery');
Route::get('/return_form_rports/Publicgamings', [App\Http\Controllers\ReturnFormReportsController::class, 'Publicgamings'])->name('return_form_rports.Publicgamings');
Route::get('/return_form_rports/bookmarkers', [App\Http\Controllers\ReturnFormReportsController::class, 'bookmarkers'])->name('return_form_rports.bookmarkers');

Route::get('/categorytypes',[App\Http\Controllers\CategoryTypesController::class, 'index'])->name('categorytypes');   
Route::post('/categorytypes/add', [App\Http\Controllers\AdminuserController::class, 'store'])->name('categorytypes.add');
Route::get('/CategoryTypeNam/get',[App\Http\Controllers\CategoryTypesController::class, 'CategoryTypes']);



Route::get('/useractivitylogs',[App\Http\Controllers\AuditLogsController::class, 'index'])->name('useractivitylogs');   

Route::get('/bookmarkersrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'createPDF'])->name('bookmarkersrepo.pdf');
Route::get('/reports',[App\Http\Controllers\ReportsController::class, 'index'])->name('reports');   
Route::get('/reportsview/{id}',[App\Http\Controllers\ReportsController::class, 'bookmarkersreport'])->name('reportsview');   
Route::get('/publiclotterysreport',[App\Http\Controllers\ReportsController::class, 'publiclotterysreport'])->name('publiclotterysreport');   
Route::get('/publicgamingreport',[App\Http\Controllers\ReportsController::class, 'publicgamingreport'])->name('publicgamingreport');   

Route::get('/indexpubliclottery',[App\Http\Controllers\ReportsController::class, 'indexpubliclottery'])->name('indexpubliclottery');   
Route::get('/indexpublicgaming',[App\Http\Controllers\ReportsController::class, 'indexpublicgaming'])->name('indexpublicgaming');   
Route::get('/reportsview_publiclottery/{id}',[App\Http\Controllers\ReportsController::class, 'reportsview_publiclottery'])->name('reportsview_publiclottery');   

Route::get('/publicLotterysrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'puliclottery_createPDF'])->name('publicLotterysrepo.pdf');

Route::get('/reportsview_publicgaming/{id}',[App\Http\Controllers\ReportsController::class, 'reportsview_publicgaming'])->name('reportsview_publicgaming');   

Route::get('/publicgamingsrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publicgaming_createPDF'])->name('publicgamingsrepo.pdf');

// =====Company GGR reporst ======///
Route::get('/reports/company-ggr',[App\Http\Controllers\ReportsController::class, 'companyGGr'])->name('reports.company-ggr');

Route::get('/reports/publiclotteryGGr',[App\Http\Controllers\ReportsController::class, 'publiclotteryGGr'])->name('reports.publiclotteryGGr');
Route::get('/reports/publicgamingGGr',[App\Http\Controllers\ReportsController::class, 'publicGamingGGr'])->name('reports.publicgamingGGr');


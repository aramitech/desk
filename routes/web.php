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
//  Route::group(['prefix' => '/desk/public'], function () {
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();






// ADMIN
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'loginView'])->name('admin-login');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin-login');

Route::get('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'loginView'])->name('super-admin-login');
Route::post('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'login'])->name('super-admin-login');

// ADMIN
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'loginView'])->name('admin-login');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin-login');

Route::get('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'loginView'])->name('super-admin-login');
Route::post('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'login'])->name('super-admin-login');



Route::group(['middleware' => ['auth.all']], function () {
    ///all auth routes here
  



//Users Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['bookmarkerscompany.access']], function () {
    Route::get('/bookmarkersadminusercompany', [App\Http\Controllers\CompanyController::class, 'bookmarkersadminusercompany'])->name('bookmarkersadminusercompany');
});
//add middleware to protect unauthorized
Route::group(['middleware' => ['publiclotterycompany.access']], function () {
    Route::get('/publiclotteryadminusercompany', [App\Http\Controllers\CompanyPublicLotteryController::class, 'publiclotteryadminusercompany'])->name('publiclotteryadminusercompany');
    Route::get('/company/publiclotteryuser', [App\Http\Controllers\CompanyPublicLotteryController::class, 'publiclotteryuser'])->name('company.publiclotteryuser');
});

Route::group(['middleware' => ['publicgamingcompany.access']], function () {
    Route::get('/publicgamingadminusercompany', [App\Http\Controllers\CompanyPublicGamingController::class, 'publicgamingadminusercompany'])->name('publicgamingadminusercompany');
    Route::get('/company/publicgaminguser', [App\Http\Controllers\CompanyPublicGamingController::class, 'publicgaminguser'])->name('company.publicgaminguser');

});

Route::get('/publicgaminglist', [App\Http\Controllers\CompanyPublicGamingController::class, 'publicgaminglist'])->name('publicgaminglist');






//Admin Section Routs
//add middleware to protect unauthorized
Route::group(['middleware' => ['bookmarkersrecords.access']], function () {
   Route::get('/bookmarkers/adminindex',[App\Http\Controllers\BookMarkersController::class, 'adminindex'])->name('bookmarkers.adminindex');
   Route::get('/userindex',[App\Http\Controllers\BookMarkersController::class, 'userindex'])->name('bookmarkers.userindex');

});
Route::group(['middleware' => ['publiclottery.access']], function () {
    Route::get('/adminuserpubliclottery',[App\Http\Controllers\PublicLotteryController::class, 'adminuserpubliclottery'])->name('adminuserpubliclottery');
    Route::get('/userpubliclottery',[App\Http\Controllers\PublicLotteryController::class, 'userpubliclottery'])->name('userpubliclottery');   
});
Route::group(['middleware' => ['publicgaming.access']], function () {
    Route::get('/publicgamingadminindex',[App\Http\Controllers\PublicgamingsController::class, 'publicgamingadminindex'])->name('publicgamingadminindex');
    Route::get('/publicgaminguserindex', [App\Http\Controllers\PublicgamingsController::class, 'publicgaminguserindex'])->name('publicgaminguserindex');
});




//add middleware to protect unauthorized
Route::group(['middleware' => ['companies.access']], function () {
    Route::get('/company/bookmarkers', [App\Http\Controllers\CompanyController::class, 'bookmarkers'])->name('company.bookmarkers');
    Route::get('/company/bookmarkersusers', [App\Http\Controllers\CompanyController::class, 'bookmarkersusers'])->name('company.bookmarkersusers');

   
});
//add middleware to protect unauthorized
Route::group(['middleware' => ['bookmarkers.access']], function () {
    Route::get('/company/publickgaming', [App\Http\Controllers\CompanyController::class, 'publickgaming'])->name('company.publickgaming');
});



//Admin Routes

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'store'])->name('users.add');
Route::post('/users/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::post('/users/delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
Route::post('/users/updaterole', [App\Http\Controllers\UsersController::class, 'updaterole'])->name('users.updaterole');
Route::get('/users/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
Route::post('/users/updatepassword', [App\Http\Controllers\UsersController::class, 'updatepassword'])->name('users.updatepassword');
Route::get('/users/assignroleuser/{id}', [App\Http\Controllers\UsersController::class, 'assignroleuser'])->name('assignroleuser');
Route::post('/updaterole', [App\Http\Controllers\UsersController::class, 'updaterole'])->name('updaterole');
Route::get('/user_type_names/get',[App\Http\Controllers\UsersController::class, 'user_type_names'])->name('user_type_names');
Route::get('/users/admins_user/{id}', [App\Http\Controllers\UsersController::class, 'admins_user'])->name('admins_user');



Route::get('/users/viewassignedusersroles', [App\Http\Controllers\UsersController::class, 'viewassignedusersroles'])->name('viewassignedusersroles');
Route::get('/access_records_bookmarkers/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'accessuserswithright'])->name('access_records_bookmarkers');
Route::get('/deny_records_bookmarkers/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'denyaccessuserswithright'])->name('deny_records_bookmarkers');

Route::get('/access_bookmarkersstatus/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_bookmarkersstatus'])->name('access_bookmarkersstatus');
Route::get('/deny_bookmarkersstatus/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_bookmarkersstatus'])->name('deny_bookmarkersstatus');

Route::get('/access_bookmarkersshop_status/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_bookmarkersshop_status'])->name('access_bookmarkersshop_status');
Route::get('/deny_bookmarkersshop_status/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_bookmarkersshop_status'])->name('deny_bookmarkersshop_status');

Route::get('/access_lottery_name/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_lottery_name'])->name('access_lottery_name');
Route::get('/deny_lottery_name/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_lottery_name'])->name('deny_lottery_name');

Route::get('/access_records_public_lotery/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_records_public_lotery'])->name('access_records_public_lotery');
Route::get('/deny_records_public_lotery/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_records_public_lotery'])->name('deny_records_public_lotery');

Route::get('/access_publiclotterystatus/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_publiclotterystatus'])->name('access_publiclotterystatus');
Route::get('/deny_publiclotterystatus/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_publiclotterystatus'])->name('deny_publiclotterystatus');

Route::get('/access_publicgamingstatus/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_publicgamingstatus'])->name('access_publicgamingstatus');
Route::get('/deny_publicgamingstatus/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_publicgamingstatus'])->name('deny_publicgamingstatus');

Route::get('/access_records_public_gaming/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_records_public_gaming'])->name('access_records_public_gaming');
Route::get('/deny_records_public_gaming/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_records_public_gaming'])->name('deny_records_public_gaming');

Route::get('/access_editstatus/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_editstatus'])->name('access_editstatus');
Route::get('/deny_editstatus/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_editstatus'])->name('deny_editstatus');

Route::get('/access_deletestatus/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_deletestatus'])->name('access_deletestatus');
Route::get('/deny_deletestatus/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_deletestatus'])->name('deny_deletestatus');

Route::get('/access_sendsms_status/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_sendsms_status'])->name('access_sendsms_status');
Route::get('/deny_sendsms_status/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_sendsms_status'])->name('deny_sendsms_status');

Route::get('/access_companies_status/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_companies_status'])->name('access_companies_status');
Route::get('/deny_companies_status/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_companies_status'])->name('deny_companies_status');

Route::get('/access_records_company/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_records_company'])->name('access_records_company');
Route::get('/deny_records_company/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_records_company'])->name('deny_records_company');

Route::get('/access_user_accounts_status/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_user_accounts_status'])->name('access_user_accounts_status');
Route::get('/deny_user_accounts_status/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_user_accounts_status'])->name('deny_user_accounts_status');

Route::get('/access_records_accounts/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_records_accounts'])->name('access_records_accounts');
Route::get('/deny_records_accounts/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_records_accounts'])->name('deny_records_accounts');

Route::get('/access_access_registry/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_access_registry'])->name('access_access_registry');
Route::get('/deny_access_registry/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_access_registry'])->name('deny_access_registry');

Route::get('/access_access_file_registry/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_access_file_registry'])->name('access_access_file_registry');
Route::get('/deny_access_file_registry/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_access_file_registry'])->name('deny_access_file_registry');

Route::get('/access_assign_file_registry/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_assign_file_registryy'])->name('access_assign_file_registry');
Route::get('/deny_assign_file_registry/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_assign_file_registry'])->name('deny_assign_file_registry');

Route::get('/access_assign_task/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_assign_task'])->name('access_assign_task');
Route::get('/deny_assign_task/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_assign_task'])->name('deny_assign_task');

Route::get('/access_admin_assign_companies/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_admin_assign_companies'])->name('access_admin_assign_companies');
Route::get('/deny_admin_assign_companies/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_admin_assign_companies'])->name('deny_admin_assign_companies');

Route::get('/access_admin_assign_record_entry/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_admin_assign_record_entry'])->name('access_admin_assign_record_entry');
Route::get('/deny_admin_assign_record_entry/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_admin_assign_record_entry'])->name('deny_admin_assign_record_entry');

Route::get('/access_admin_assign_accounts/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_admin_assign_accounts'])->name('access_admin_assign_accounts');
Route::get('/deny_admin_assign_accounts/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_admin_assign_accounts'])->name('deny_admin_assign_accounts');

Route::get('/access_admin_assign_registry/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_admin_assign_registry'])->name('access_admin_assign_registry');
Route::get('/deny_admin_assign_registry/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_admin_assign_registry'])->name('deny_admin_assign_registry');

Route::get('/access_bookmarkers_group/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_bookmarkers_group'])->name('access_bookmarkers_group');
Route::get('/deny_bookmarkers_group/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_bookmarkers_group'])->name('deny_bookmarkers_group');

Route::get('/access_public_lottery_group/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_public_lottery_group'])->name('access_public_lottery_group');
Route::get('/deny_public_lottery_group/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_public_lottery_group'])->name('deny_public_lottery_group');

Route::get('/access_public_gaming_group/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_public_gaming_group'])->name('access_public_gaming_group');
Route::get('/deny_public_gaming_group/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_public_gaming_group'])->name('deny_public_gaming_group');

Route::get('/access_actions_group/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_actions_group'])->name('access_actions_group');
Route::get('/deny_actions_group/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_actions_group'])->name('deny_actions_group');

Route::get('/access_search/{Allowedaccess}', [App\Http\Controllers\UsersController::class, 'access_search'])->name('access_search');
Route::get('/deny_search/{NotAllowedaccess}', [App\Http\Controllers\UsersController::class, 'deny_search'])->name('deny_search');



Route::get('/userss/delete/{id}', [App\Http\Controllers\UsersController::class, 'death'])->name('userss.delete');



Route::get('/users_admin', [App\Http\Controllers\UsersController::class, 'users_admin'])->name('users_admin');





Route::any('/admin-logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin-logout');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'master'])->name('admin-dashboard');
// SUPER ADMIN
Route::any('/super-admin-logout', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'logout'])->name('super-admin-logout');


// Route::group(['middleware'=>['auth.admin'] OR ['auth.superadmin'] OR ['auth']],function(){

Route::get('/super-admin/dashboard', [App\Http\Controllers\SuperAdminController::class, 'dashboard'])->name('super-admin-dashboard');


Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::post('/company/add', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.add');
Route::post('/company/update', [App\Http\Controllers\CompanyController::class, 'updateBookmarkersCompany'])->name('company.update');
Route::post('/company/delete', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.delete');
Route::post('/bookmarkerscompany/upload', [App\Http\Controllers\CompanyController::class, 'upload'])->name('bookmarkerscompany.upload');

Route::post('/publiclotterycompany/upload', [App\Http\Controllers\CompanyController::class, 'publiclotterycompany'])->name('publiclotterycompany.upload');
Route::post('/publicgamingcompany/upload', [App\Http\Controllers\CompanyController::class, 'publicgamingcompany'])->name('publicgamingcompany.upload');



Route::post('/company/addbookmarkers', [App\Http\Controllers\CompanyController::class, 'addbookmarkers']);
Route::post('/company/addpublicgaming', [App\Http\Controllers\CompanyController::class, 'addpublicgaming'])->name('company.addpublicgaming');

Route::get('/company/bookmarkers2', [App\Http\Controllers\CompanyController::class, 'bookmarkers2'])->name('company.bookmarkers2');

Route::get('/company/publiclottery', [App\Http\Controllers\CompanyPublicLotteryController::class, 'publiclottery'])->name('company.publiclottery');


Route::post('/company/addpubliclottery', [App\Http\Controllers\CompanyController::class, 'addpubliclottery']);
Route::get('/records_delete_company/{id}', [App\Http\Controllers\CompanyController::class, 'death'])->name('records_delete_company');


Route::get('/publiclotterynumber_id/{id}', [App\Http\Controllers\PublicLotteryController::class, 'death_lotterynumber'])->name('records_delete_lotterynumber');



Route::get('/company/publicgaming', [App\Http\Controllers\CompanyPublicGamingController::class, 'publicgaming'])->name('company.publicgaming');


//all company 
Route::get('/company/bookmarkers_shop_report', [App\Http\Controllers\CompanyReportController::class, 'bookmarkers_shop_report'])->name('company.bookmarkers_shop_report');
Route::get('/shopcompanystatus', [App\Http\Controllers\CompanyReportController::class, 'shopcompanystatus'])->name('shopcompanystatus');
Route::get('/shopcompanystatusActive', [App\Http\Controllers\CompanyReportController::class, 'shopcompanystatusActive'])->name('shopcompanystatusActive');
Route::get('/shopcompanystatusBlocked', [App\Http\Controllers\CompanyReportController::class, 'shopcompanystatusBlocked'])->name('shopcompanystatusBlocked');
Route::get('/shopcompanystatusdeactivated', [App\Http\Controllers\CompanyReportController::class, 'shopcompanystatusdeactivated'])->name('shopcompanystatusdeactivated');


//all company 
Route::get('/company/bookmarkers_company_report', [App\Http\Controllers\CompanyReportController::class, 'bookmarkers_company_report'])->name('company.bookmarkers_company_report');
// Bookmarkers Company Report
Route::get('/companystatus', [App\Http\Controllers\CompanyReportController::class, 'bookmarkers_company_report'])->name('companystatus');
Route::get('/companystatusActive', [App\Http\Controllers\CompanyReportController::class, 'companystatusActive'])->name('companystatusActive');
Route::get('/companystatusBlocked', [App\Http\Controllers\CompanyReportController::class, 'companystatusBlocked'])->name('companystatusBlocked');
Route::get('/companystatusdeactivated', [App\Http\Controllers\CompanyReportController::class, 'companystatusdeactivated'])->name('companystatusdeactivated');
Route::get('/companystatusHavePayBill', [App\Http\Controllers\CompanyReportController::class, 'companystatusHavePayBill'])->name('companystatusHavePayBill');
Route::get('/companystatusNoPayBill', [App\Http\Controllers\CompanyReportController::class, 'companystatusNoPayBill'])->name('companystatusNoPayBill');


Route::get('/companystatusPublicLoottery', [App\Http\Controllers\CompanyReportController::class, 'companystatusPublicLoottery'])->name('companystatusPublicLoottery');
Route::get('/companystatusPublicGaming', [App\Http\Controllers\CompanyReportController::class, 'companystatusPublicGaming'])->name('companystatusPublicGaming');
Route::get('/companystatusBookMarkers', [App\Http\Controllers\CompanyReportController::class, 'companystatusBookMarkers'])->name('companystatusBookMarkers');
Route::get('/companystatusAll', [App\Http\Controllers\CompanyReportController::class, 'companystatusAll'])->name('companystatusAll');


// Accounts



// publiclottery Company Report
Route::get('/company/publiclottery_company_report', [App\Http\Controllers\CompanyReportController::class, 'publiclottery_company_report'])->name('company.publiclottery_company_report');
Route::get('/publiclotterycompanystatus', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatus'])->name('publiclotterycompanystatus');
Route::get('/publiclotterycompanystatusActive', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatusActive'])->name('publiclotterycompanystatusActive');
Route::get('/publiclotterycompanystatusBlocked', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatusBlocked'])->name('publiclotterycompanystatusBlocked');
Route::get('/publiclotterycompanystatusdeactivated', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatusdeactivated'])->name('publiclotterycompanystatusdeactivated');
Route::get('/publiclotterycompanystatusHavePayBill', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatusHavePayBill'])->name('publiclotterycompanystatusHavePayBill');
Route::get('/publiclotterycompanystatusNoPayBill', [App\Http\Controllers\CompanyReportController::class, 'publiclotterycompanystatusNoPayBill'])->name('publiclotterycompanystatusNoPayBill');


//publicgaming   Company Report 
Route::get('/company/publicgaming_company_report', [App\Http\Controllers\CompanyReportController::class, 'publicgaming_company_report'])->name('company.publicgaming_company_report');
Route::get('/publicgamingcompanystatus', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatus'])->name('publicgamingcompanystatus');
Route::get('/publicgamingcompanystatusActive', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatusActive'])->name('publicgamingcompanystatusActive');
Route::get('/publicgamingcompanystatusBlocked', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatusBlocked'])->name('publicgamingcompanystatusBlocked');
Route::get('/publicgamingcompanystatusdeactivated', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatusdeactivated'])->name('publicgamingcompanystatusdeactivated');
Route::get('/publicgamingcompanystatusHavePayBill', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatusHavePayBill'])->name('publicgamingcompanystatusHavePayBill');
Route::get('/publicgamingcompanystatusNoPayBill', [App\Http\Controllers\CompanyReportController::class, 'publicgamingcompanystatusNoPayBill'])->name('publicgamingcompanystatusNoPayBill');



Route::post('/company/delete_destroybookmarkerscompany', [App\Http\Controllers\CompanyController::class, 'destroybookmarkerscompany'])->name('company.delete_destroybookmarkerscompany');
Route::post('/company/delete_destroypublicgamingcompany', [App\Http\Controllers\CompanyController::class, 'destroypublicgamingcompany'])->name('company.delete_destroypublicgamingcompany');
Route::post('/company/delete_destroypubliclottery', [App\Http\Controllers\CompanyController::class, 'destroypubliclottery'])->name('company.delete_destroypubliclottery');
//company/updateBookmarkersCompany
Route::post('/company/updateBookmarkersCompany', [App\Http\Controllers\CompanyController::class, 'updateBookmarkersCompany'])->name('company.updateBookmarkersCompany');
Route::get('/company_name/get',[App\Http\Controllers\CompanyController::class, 'getCompanyName']);
Route::get('/company_category_name/get',[App\Http\Controllers\CompanyController::class, 'company_category_name']);




Route::get('/bookmarkers', [App\Http\Controllers\BookMarkersController::class, 'index'])->name('bookmarkers');
Route::post('/bookmarkers/add', [App\Http\Controllers\BookMarkersController::class, 'store'])->name('bookmarkers.add');
Route::post('/bookmarkers/upload', [App\Http\Controllers\BookMarkersController::class, 'upload'])->name('bookmarkers.upload');
Route::post('/bookmarkers/update', [App\Http\Controllers\BookMarkersController::class, 'update'])->name('bookmarkers.update');
Route::post('/bookmarkers/delete', [App\Http\Controllers\BookMarkersController::class, 'destroy'])->name('bookmarkers.delete');
Route::get('/license_name/get',[App\Http\Controllers\BookMarkersController::class, 'getLicenseeName']);

Route::get('/addbookmarkers',[App\Http\Controllers\BookMarkersController::class, 'addbookmarkers'])->name('bookmarkers.addbookmarkers');
Route::get('/bookmarkersdata/get',[App\Http\Controllers\BookMarkersController::class, 'bookmarkersdata'])->name('bookmarkers.bookmarkersdata');
Route::get('/bookmarkersdatauser/get',[App\Http\Controllers\BookMarkersController::class, 'bookmarkersdatauser'])->name('bookmarkers.bookmarkersdatauser');

Route::get('/bookmarker_shop_name/get',[App\Http\Controllers\BookMarkersController::class, 'bookmarker_shop_name'])->name('bookmarkers.bookmarker_shop_name');
Route::get('/inactivebookmarkers',[App\Http\Controllers\BookMarkersController::class, 'inactivebookmarkers'])->name('bookmarkers.inactivebookmarkers');


Route::get('/posts',[App\Http\Controllers\BookMarkersController::class, 'posts']);



Route::get('/adminbookmarkers', [App\Http\Controllers\AdminBookMarkersController::class, 'index'])->name('adminbookmarkers');
Route::get('/adminpublicgaming', [App\Http\Controllers\AdminPublicgamingsController::class, 'index'])->name('adminpublicgaming');

Route::get('/adminpubliclottery', [App\Http\Controllers\AdminPublicLotteryController::class, 'index'])->name('adminpubliclottery');


Route::get('/publiclottery', [App\Http\Controllers\PublicLotteryController::class, 'index'])->name('publiclottery');
Route::post('/publiclottery/add', [App\Http\Controllers\PublicLotteryController::class, 'store'])->name('publiclottery.add');
Route::post('/publiclottery/update', [App\Http\Controllers\PublicLotteryController::class, 'update'])->name('publiclottery.update');
Route::post('/publiclottery/delete', [App\Http\Controllers\PublicLotteryController::class, 'destroy'])->name('publiclottery.delete');
Route::get('/publiclottery_license_name/get',[App\Http\Controllers\PublicLotteryController::class, 'getLicenseeName']);
Route::post('/publiclottery/upload', [App\Http\Controllers\PublicLotteryController::class, 'upload'])->name('publiclottery.upload');
Route::get('/PublicLotterydata/get',[App\Http\Controllers\PublicLotteryController::class, 'publiclotterydata'])->name('publiclottery.ppubliclotterydata');
Route::get('/PublicLotterydatauser/get',[App\Http\Controllers\PublicLotteryController::class, 'PublicLotterydatauser'])->name('publiclottery.PublicLotterydatauser');





Route::get('/publiclotteryAllreports_createPDF/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publiclotteryAllreports_createPDF'])->name('publiclotteryAllreports_createPDF');   
Route::get('/publicgamingAllreports_createPDF/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publicgamingAllreports_createPDF'])->name('publicgamingAllreports_createPDF');   


//Public Lotery number

Route::get('/indexlotterynumberadmins', [App\Http\Controllers\PublicLotteryController::class, 'indexlotterynumberadmins'])->name('indexlotterynumberadmins');
Route::get('/indexlotterynumber', [App\Http\Controllers\PublicLotteryController::class, 'indexlotterynumber'])->name('indexlotterynumber');
Route::get('/lottery_numbers_names/{id}', [App\Http\Controllers\PublicLotteryController::class, 'lottery_numbers_names'])->name('lottery_numbers_names');


Route::post('/lotterynumber/add', [App\Http\Controllers\PublicLotteryController::class, 'lotterynumber_store'])->name('lotterynumber.add');

Route::get('/lotery_shop_name/get',[App\Http\Controllers\PublicLotteryController::class, 'lotery_shop_name'])->name('lotterynumber.lotery_shop_name');
Route::get('/lotterynumbershop', [App\Http\Controllers\CompanyReportController::class, 'lotterynumbershop'])->name('lotterynumbershop');


Route::get('/publicgaming', [App\Http\Controllers\PublicgamingsController::class, 'index'])->name('publicgaming');
Route::post('/publicgaming/add', [App\Http\Controllers\PublicgamingsController::class, 'store'])->name('publicgaming.add');
Route::post('/publicgaming/update', [App\Http\Controllers\PublicgamingsController::class, 'update'])->name('publicgaming.update');
Route::get('/publicgaming/delete', [App\Http\Controllers\PublicgamingsController::class, 'destroy'])->name('publicgaming.delete');
Route::get('/publicgaming_license_name/get',[App\Http\Controllers\PublicgamingsController::class, 'getLicenseeName']);
Route::post('/publicgaming/upload', [App\Http\Controllers\PublicgamingsController::class, 'upload'])->name('publicgaming.upload');
Route::get('/publicgamingsdata/get',[App\Http\Controllers\PublicgamingsController::class, 'publicgamingsdata'])->name('publicgaming.publicgamingsdata');
Route::get('/publicgamingsdatauser/get',[App\Http\Controllers\PublicgamingsController::class, 'publicgamingsdatauser'])->name('publicgaming.publicgamingsdatauser');




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
Route::get('/StatusTypeNam/get',[App\Http\Controllers\CategoryTypesController::class, 'StatusTypeNam']);



Route::get('/useractivitylogs',[App\Http\Controllers\AuditLogsController::class, 'index'])->name('useractivitylogs');   
Route::get('/AuditLogsdata/get',[App\Http\Controllers\AuditLogsController::class, 'auditlogsdata'])->name('useractivitylogs.AuditLogsdata');




Route::get('/bookmarkersrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'createPDF'])->name('bookmarkersrepo.pdf');
Route::get('/reports',[App\Http\Controllers\ReportsController::class, 'index'])->name('reports');   
Route::get('/reportsview/{id}',[App\Http\Controllers\ReportsController::class, 'bookmarkersreport'])->name('reportsview');   
Route::get('/bookmarkersAllreport/{id}',[App\Http\Controllers\ReportsController::class, 'bookmarkersAllreport'])->name('bookmarkersAllreport');   
Route::get('/bookmarkersAllreport_createPDF/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'bookmarkersAllreport_createPDF'])->name('bookmarkersAllreport_createPDF');   


Route::get('/publiclotteryAllreport/{id}',[App\Http\Controllers\ReportsController::class, 'publiclotteryAllreport'])->name('publiclotteryAllreport');   

Route::get('/publiclotterysreport',[App\Http\Controllers\ReportsController::class, 'publiclotterysreport'])->name('publiclotterysreport');   
Route::get('/publicgamingreport',[App\Http\Controllers\ReportsController::class, 'publicgamingreport'])->name('publicgamingreport');   

Route::get('/indexpubliclottery',[App\Http\Controllers\ReportsController::class, 'indexpubliclottery'])->name('indexpubliclottery');   
Route::get('/indexpublicgaming',[App\Http\Controllers\ReportsController::class, 'indexpublicgaming'])->name('indexpublicgaming');   
Route::get('/reportsview_publiclottery/{id}',[App\Http\Controllers\ReportsController::class, 'reportsview_publiclottery'])->name('reportsview_publiclottery');   

Route::get('/publicLotterysrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'puliclottery_createPDF'])->name('publicLotterysrepo.pdf');

Route::get('/reportsview_publicgaming/{id}',[App\Http\Controllers\ReportsController::class, 'reportsview_publicgaming'])->name('reportsview_publicgaming');   
Route::get('/gamingsAllreport/{id}',[App\Http\Controllers\ReportsController::class, 'gamingsAllreport'])->name('gamingsAllreport');   

Route::get('/publicgamingsrepo/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publicgaming_createPDF'])->name('publicgamingsrepo.pdf');

// =====Company GGR reporst ======///
Route::get('/reports/company-ggr',[App\Http\Controllers\ReportsController::class, 'companyGGr'])->name('reports.company-ggr');

Route::get('/reports/publiclotteryGGr',[App\Http\Controllers\ReportsController::class, 'publiclotteryGGr'])->name('reports.publiclotteryGGr');
Route::get('/reports/publicgamingGGr',[App\Http\Controllers\ReportsController::class, 'publicGamingGGr'])->name('reports.publicgamingGGr');
Route::get('/reports/allCompaniesGraph',[App\Http\Controllers\ReportsController::class, 'allCompaniesGraph'])->name('reports.allCompaniesGraph');
Route::get('/activestatuscompanies',[App\Http\Controllers\ReportsController::class, 'activestatuscompanies'])->name('reports.activestatuscompanies');

Route::get('/bookmarkerspdf', [App\Http\Controllers\ReportsController::class, 'bookmarkerspdf'])->name('bookmarkerspdf');
Route::get('/publiclotterypdf', [App\Http\Controllers\ReportsController::class, 'publiclotterypdf'])->name('publiclotterypdf');
Route::get('/publicgamingpdf', [App\Http\Controllers\ReportsController::class, 'publicgamingpdf'])->name('publicgamingpdf');




 

Route::get('/shop_numbers/{id}',[App\Http\Controllers\ShopController::class, 'shop_numbers'])->name('shop_numbers');   

Route::get('/shopindex',[App\Http\Controllers\ShopController::class, 'shopindex'])->name('shopindex');   

Route::get('/shop',[App\Http\Controllers\ShopController::class, 'index'])->name('shop');   
Route::get('/shopdata/get',[App\Http\Controllers\ShopController::class, 'shopdata'])->name('shopdata.shopdata');
Route::post('/shop/add', [App\Http\Controllers\ShopController::class, 'store'])->name('shop.add');
Route::post('/shop/update', [App\Http\Controllers\ShopController::class, 'update'])->name('shop.update');
Route::get('/publiclottery_shop', [App\Http\Controllers\ShopController::class, 'publiclottery_shop'])->name('publiclottery_shop');
Route::get('/publicgaming_shop', [App\Http\Controllers\ShopController::class, 'publicgaming_shop'])->name('publicgaming_shop');
Route::get('/license_shop_name/get',[App\Http\Controllers\ShopController::class, 'update']);
Route::get('/shop/delete/{id}', [App\Http\Controllers\ShopController::class, 'destroy'])->name('shop.delete');
Route::get('/shopo/delete/{id}', [App\Http\Controllers\ShopController::class, 'death'])->name('shopo.delete');


//otp  verify
Route::get('/otp-verify',[App\Http\Controllers\OtpController::class, 'view'])->name('otp-verify');
Route::post('/otp-verify',[App\Http\Controllers\OtpController::class, 'verify'])->name('verify');

//otp  verify User
 Route::get('/otp-verify-user',[App\Http\Controllers\UserOtpController::class, 'view_user']);
 Route::post('/otp-verify-user',[App\Http\Controllers\UserOtpController::class, 'verify_user'])->name('verify_user');

 ///New
 Route::get('/admin/master', [App\Http\Controllers\AdminController::class, 'master'])->name('admin-master');

 Route::get('/admin/accountsetting/{id}', [App\Http\Controllers\AdminController::class, 'accountsetting'])->name('accountsetting');
 Route::post('/admin/adminchangepassword', [App\Http\Controllers\AdminuserController::class, 'adminchangepassword'])->name('adminchangepassword');
 Route::post('/admin/notes', [App\Http\Controllers\NotesController::class, 'store'])->name('notes');
 Route::post('/admin/notes/view', [App\Http\Controllers\NotesController::class, 'index'])->name('notes.notes');
 Route::get('/admin/accountsettingchangepassword/{id}', [App\Http\Controllers\AdminController::class, 'accountsettingchangepassword'])->name('admin.accountsettingchangepassword');
 Route::get('/notes/delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('notes.delete');


 Route::get('/calender', [App\Http\Controllers\CalenderController::class, 'index'])->name('calender');

 Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo');
 Route::post('/todo/addtask', [App\Http\Controllers\TodoController::class, 'addtask'])->name('todo.addtask');
 Route::get('/todo/user', [App\Http\Controllers\TodoController::class, 'user'])->name('todo.user');
 Route::get('/taskindex', [App\Http\Controllers\TodoController::class, 'taskindex'])->name('taskindex');
 Route::get('/taskindexreplied', [App\Http\Controllers\TodoController::class, 'taskindexreplied'])->name('taskindexreplied');
 Route::get('/records_confirm_task/{id}', [App\Http\Controllers\TodoController::class, 'records_confirm_task'])->name('records_confirm_task');
 Route::post('/replytotask', [App\Http\Controllers\TodoController::class, 'replytotask'])->name('replytotask');
 Route::get('/deletetask/{id}', [App\Http\Controllers\TodoController::class, 'deletetask'])->name('deletetask');


 


 Route::get('/accountsedit', [App\Http\Controllers\AccountsController::class, 'accountsedit'])->name('accountsedit');

Route::get('/accounts', [App\Http\Controllers\AccountsController::class, 'index'])->name('accounts');
Route::post('/accounts/add', [App\Http\Controllers\AccountsController::class, 'store'])->name('accounts.add');
Route::get('/accounts/delete_accounts/{id}', [App\Http\Controllers\AccountsController::class, 'destroy'])->name('accounts.delete_accounts');

Route::get('/company/accounts', [App\Http\Controllers\AccountsController::class, 'records'])->name('company.accounts');
Route::get('/company/accountsadmins', [App\Http\Controllers\AccountsController::class, 'accountsadmins'])->name('company.accountsadmins');


Route::get('/records_delete/{id}', [App\Http\Controllers\AccountsController::class, 'death'])->name('records_delete');
Route::post('/accounts/updateaccounts', [App\Http\Controllers\AccountsController::class, 'updateaccounts'])->name('accounts.updateaccounts');
Route::get('/accountsusers', [App\Http\Controllers\AccountsController::class, 'accountsusers'])->name('accountsusers');
Route::get('/accountspdf', [App\Http\Controllers\AccountsController::class, 'accountspdf'])->name('accountspdf');


//add middleware to protect unauthorized
Route::group(['middleware' => ['accounts.access']], function () {
    Route::get('/accountsregistryuseradmin',[App\Http\Controllers\AccountsController::class, 'accountsregistryuseradmin'])->name('accountsregistryuseradmin');   
});

Route::get('/exportExcel',[App\Http\Controllers\AccountsController::class, 'exportExcel'])->name('exportExcel');   
Route::get('/exportExcelBookmarkers',[App\Http\Controllers\ReportsController::class, 'exportExcelBookmarkers'])->name('exportExcelBookmarkers');   

Route::get('/Allpublicgamingstotals', [App\Http\Controllers\ReportsController::class, 'Allpublicgamingstotals'])->name('Allpublicgamingstotals');
Route::get('/Allpubliclotterytotals', [App\Http\Controllers\ReportsController::class, 'Allpubliclotterytotals'])->name('Allpubliclotterytotals');
Route::get('/AllBookMarkertotals', [App\Http\Controllers\ReportsController::class, 'AllBookMarkertotals'])->name('AllBookMarkertotals');


Route::get('/AllBookMarkersrecordsreport', [App\Http\Controllers\ReportsController::class, 'AllBookMarkersrecordsreport'])->name('AllBookMarkersrecordsreport');
Route::get('/Allpubliclotteryrecordsreport', [App\Http\Controllers\ReportsController::class, 'Allpubliclotteryrecordsreport'])->name('Allpubliclotteryrecordsreport');
Route::get('/Allgamingrecordsreport', [App\Http\Controllers\ReportsController::class, 'Allgamingrecordsreport'])->name('Allgamingrecordsreport');



Route::get('/registry', [App\Http\Controllers\RegistryController::class, 'index'])->name('registry');
Route::post('/registry/add', [App\Http\Controllers\RegistryController::class, 'store'])->name('registry.add');

//add middleware to protect unauthorized
Route::group(['middleware' => ['registry.access']], function () {
    Route::get('/registryadmin',[App\Http\Controllers\RegistryController::class, 'registryadmin'])->name('registryadmin');   
    Route::get('/registryuser', [App\Http\Controllers\RegistryController::class, 'indexuser'])->name('registryuser');

});
Route::get('/reports/registry',[App\Http\Controllers\RegistryController::class, 'reportsregistry'])->name('reports.registry');  
Route::get('/reports/registryuseradmin',[App\Http\Controllers\RegistryController::class, 'registryuseradmin'])->name('reports.registryuseradmin');  


Route::get('/exportExcelregistry',[App\Http\Controllers\RegistryController::class, 'exportExcelregistry'])->name('exportExcelregistry');   
Route::get('/registrypdf',[App\Http\Controllers\RegistryController::class, 'registrypdf'])->name('registrypdf');   


Route::get('/class_names_filing/get',[App\Http\Controllers\FilingRegistryController::class, 'class_names_filing'])->name('class_names_filing');


Route::get('/class_names/get',[App\Http\Controllers\FilingRegistryController::class, 'class_names'])->name('class_names');
Route::post('/file_registry/add', [App\Http\Controllers\FilingRegistryController::class, 'store'])->name('file_registry.add');
Route::post('/fileregistry/delete', [App\Http\Controllers\FilingRegistryController::class, 'destroy'])->name('fileregistry.delete');

Route::group(['middleware' => ['fileregistry.access']], function () {
    Route::get('/registryfilingdmin',[App\Http\Controllers\FilingRegistryController::class, 'registryfilingdmin'])->name('registryfilingdmin');   
    Route::get('/filingregistryuser', [App\Http\Controllers\FilingRegistryController::class, 'indexuser'])->name('filingregistryuser');
    
});
Route::get('/filingregistry', [App\Http\Controllers\FilingRegistryController::class, 'index'])->name('filingregistry');

Route::get('/reports/filing',[App\Http\Controllers\FilingRegistryController::class, 'reportsfiling'])->name('reports.filing');  
Route::get('/reports/filinguseradmin',[App\Http\Controllers\FilingRegistryController::class, 'reportsfilinguseradmin'])->name('reports.filinguseradmin');  


Route::get('/exportExcelfiling',[App\Http\Controllers\FilingRegistryController::class, 'exportExcelfiling'])->name('exportExcelfiling');   
Route::get('/filingpdf',[App\Http\Controllers\FilingRegistryController::class, 'filingpdf'])->name('filingpdf');   


Route::get('/assignregistry', [App\Http\Controllers\AssignRegistryController::class, 'index'])->name('assignregistry');
Route::post('/assign_registry/add', [App\Http\Controllers\AssignRegistryController::class, 'store'])->name('assign_registry.add');
Route::get('/folio_names/get',[App\Http\Controllers\AssignRegistryController::class, 'folio_names'])->name('folio_names');
Route::post('/assignfileregistry/delete', [App\Http\Controllers\AssignRegistryController::class, 'destroy'])->name('assignfileregistry.delete');

Route::get('/class_names_assign/get',[App\Http\Controllers\AssignRegistryController::class, 'class_names_assign'])->name('class_names_assign');
//add middleware to protect unauthorized
Route::group(['middleware' => ['assignregistry.access']], function () {
    Route::get('/registryassignadmin', [App\Http\Controllers\AssignRegistryController::class, 'registryassignadmin'])->name('registryassignadmin');
    Route::get('/assignregistryuser', [App\Http\Controllers\AssignRegistryController::class, 'indexuser'])->name('assignregistryuser');

});

Route::get('/pref_names_assign/get',[App\Http\Controllers\AssignRegistryController::class, 'pref_names_assign'])->name('pref_names_assign');
Route::get('/reports/tasking', [App\Http\Controllers\AssignRegistryController::class, 'reportstasking'])->name('reports.tasking');
Route::get('/reports/taskinguseradmin', [App\Http\Controllers\AssignRegistryController::class, 'reportstaskinguseradmin'])->name('reports.taskinguseradmin');


Route::get('/taskingpdf', [App\Http\Controllers\AssignRegistryController::class, 'taskingpdf'])->name('taskingpdf');
Route::get('/exportExceltasking', [App\Http\Controllers\AssignRegistryController::class, 'exportExceltasking'])->name('exportExceltasking');



Route::post('/registry/updateregistry', [App\Http\Controllers\RegistryController::class, 'updateregistry'])->name('registry.updateregistry');
Route::post('/registry/delete', [App\Http\Controllers\RegistryController::class, 'destroy'])->name('registry.delete');


Route::get('/departmentsadmin', [App\Http\Controllers\DepartmentsController::class, 'departmentsadmin'])->name('departmentsadmin');
Route::get('/departments', [App\Http\Controllers\DepartmentsController::class, 'index'])->name('departments');
Route::post('/departments/add', [App\Http\Controllers\DepartmentsController::class, 'store'])->name('departments.add');
Route::post('/departments/delete', [App\Http\Controllers\DepartmentsController::class, 'destroy'])->name('departments.delete');
Route::post('/departments/update', [App\Http\Controllers\DepartmentsController::class, 'update'])->name('departments.update');
Route::get('/department_names/get',[App\Http\Controllers\DepartmentsController::class, 'department_names'])->name('department_names');




Route::get('/backup', [App\Http\Controllers\SettingController::class, 'backup'])->name('setting.backup');
Route::get('/send-mail', [App\Http\Controllers\MailController::class, 'sendMail'])->name('send.mail');

Route::get('/send-email-pdf', [App\Http\Controllers\PDFControllers::class, 'index'])->name('send-email-pdf');

Route::post('/send-mail-accounts', [App\Http\Controllers\AccountsController::class, 'sendMail'])->name('send-mail-accounts');
Route::post('/send-mail-registry', [App\Http\Controllers\RegistryController::class, 'sendMail'])->name('send-mail-registry');
Route::post('/send-mail-filing', [App\Http\Controllers\FilingRegistryController::class, 'sendMail'])->name('send-mail-filing');
Route::post('/send-mail-tasking', [App\Http\Controllers\AssignRegistryController::class, 'sendMail'])->name('send-mail-tasking');






//Shared Routes
Route::get('/sendsms',[App\Http\Controllers\SendSmsController::class, 'index'])->name('sendsms');   
Route::post('/sendsms/add', [App\Http\Controllers\SendSmsController::class, 'store'])->name('sendsms.add');
Route::get('/sesendbulksmsndsms/get',[App\Http\Controllers\SendSmsController::class, 'CategoryTypes']);

Route::get('/sendbulksms',[App\Http\Controllers\SendSmsController::class, 'sendbulksms'])->name('sendbulksms');   
Route::post('/send_bulksms/add', [App\Http\Controllers\SendSmsController::class, 'send_bulksms'])->name('sendsms.send_bulksms');

Route::get('/sendsmstocontact',[App\Http\Controllers\SendSmsController::class, 'sendsmstocontact'])->name('sendsmstocontact');   
Route::post('/sendsmstocontact/add', [App\Http\Controllers\SendSmsController::class, 'sendsmstocontact_add'])->name('sendsms.sendsmstocontact_add');


Route::get('/sendsmsuseradmin',[App\Http\Controllers\SendSmsController::class, 'sendsmsuseradmin'])->name('sendsmsuseradmin');   
Route::get('/sendsmstocontactuseradmin',[App\Http\Controllers\SendSmsController::class, 'sendsmstocontactuseradmin'])->name('sendsmstocontactuseradmin');   
Route::get('/sendbulksmsuseradmin',[App\Http\Controllers\SendSmsController::class, 'sendbulksmsuseradmin'])->name('sendbulksmsuseradmin');   



Route::get('/storeevents',[App\Http\Controllers\EventsController::class, 'store'])->name('storeevents');   




});

//  });
// });
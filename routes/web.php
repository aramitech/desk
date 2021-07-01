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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'store'])->name('users.add');
Route::post('/users/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::post('/users/delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
Route::post('/users/updaterole', [App\Http\Controllers\UsersController::class, 'updaterole'])->name('users.updaterole');
Route::get('/users/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
Route::post('/users/updatepassword', [App\Http\Controllers\UsersController::class, 'updatepassword'])->name('users.updatepassword');
Route::get('/users/assignroleuser/{id}', [App\Http\Controllers\UsersController::class, 'assignroleuser'])->name('assignroleuser');
Route::post('/updaterole', [App\Http\Controllers\UsersController::class, 'updaterole'])->name('updaterole');



// ADMIN
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'loginView'])->name('admin-login');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin-login');
Route::any('/admin-logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin-logout');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin-dashboard');
// SUPER ADMIN
Route::get('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'loginView'])->name('super-admin-login');
Route::post('/super-admin-login', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'login'])->name('super-admin-login');
Route::any('/super-admin-logout', [App\Http\Controllers\Auth\SuperAdminLoginController::class, 'logout'])->name('super-admin-logout');


// Route::group(['middleware'=>['auth.admin'] OR ['auth.superadmin'] OR ['auth']],function(){

Route::get('/super-admin/dashboard', [App\Http\Controllers\SuperAdminController::class, 'dashboard'])->name('super-admin-dashboard');


Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::post('/company/add', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.add');
Route::post('/company/update', [App\Http\Controllers\CompanyController::class, 'updateBookmarkersCompany'])->name('company.update');
Route::post('/company/delete', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.delete');
Route::get('/company/bookmarkers', [App\Http\Controllers\CompanyController::class, 'bookmarkers'])->name('company.bookmarkers');
Route::post('/company/addbookmarkers', [App\Http\Controllers\CompanyController::class, 'addbookmarkers']);
Route::get('/company/publickgaming', [App\Http\Controllers\CompanyController::class, 'publickgaming'])->name('company.publickgaming');
Route::post('/company/addpublicgaming', [App\Http\Controllers\CompanyController::class, 'addpublicgaming'])->name('company.addpublicgaming');

Route::get('/company/bookmarkers2', [App\Http\Controllers\CompanyController::class, 'bookmarkers2'])->name('company.bookmarkers2');

Route::get('/company/publiclottery', [App\Http\Controllers\CompanyPublicLotteryController::class, 'publiclottery'])->name('company.publiclottery');
Route::post('/company/addpubliclottery', [App\Http\Controllers\CompanyController::class, 'addpubliclottery']);

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




Route::get('/bookmarkers', [App\Http\Controllers\BookMarkersController::class, 'index'])->name('bookmarkers');
Route::post('/bookmarkers/add', [App\Http\Controllers\BookMarkersController::class, 'store'])->name('bookmarkers.add');
Route::post('/bookmarkers/upload', [App\Http\Controllers\BookMarkersController::class, 'upload'])->name('bookmarkers.upload');
Route::post('/bookmarkers/update', [App\Http\Controllers\BookMarkersController::class, 'update'])->name('bookmarkers.update');
Route::post('/bookmarkers/delete', [App\Http\Controllers\BookMarkersController::class, 'destroy'])->name('bookmarkers.delete');
Route::get('/license_name/get',[App\Http\Controllers\BookMarkersController::class, 'getLicenseeName']);

Route::get('/addbookmarkers',[App\Http\Controllers\BookMarkersController::class, 'addbookmarkers'])->name('bookmarkers.addbookmarkers');
Route::get('/bookmarkersdata/get',[App\Http\Controllers\BookMarkersController::class, 'bookmarkersdata'])->name('bookmarkers.bookmarkersdata');
Route::get('/bookmarker_shop_name/get',[App\Http\Controllers\BookMarkersController::class, 'bookmarker_shop_name'])->name('bookmarkers.bookmarker_shop_name');
Route::get('/inactivebookmarkers',[App\Http\Controllers\BookMarkersController::class, 'inactivebookmarkers'])->name('bookmarkers.inactivebookmarkers');

Route::get('/userindex',[App\Http\Controllers\BookMarkersController::class, 'userindex'])->name('bookmarkers.userindex');




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
Route::get('/userpubliclottery',[App\Http\Controllers\PublicLotteryController::class, 'userpubliclottery'])->name('userpubliclottery');   



Route::get('/publiclotteryAllreports_createPDF/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publiclotteryAllreports_createPDF'])->name('publiclotteryAllreports_createPDF');   
Route::get('/publicgamingAllreports_createPDF/pdf/{id}',[App\Http\Controllers\ReportsController::class, 'publicgamingAllreports_createPDF'])->name('publicgamingAllreports_createPDF');   


//Public Lotery number
Route::post('/lotterynumber/add', [App\Http\Controllers\PublicLotteryController::class, 'lotterynumber_store'])->name('lotterynumber.add');

Route::get('/lotery_shop_name/get',[App\Http\Controllers\PublicLotteryController::class, 'lotery_shop_name'])->name('lotterynumber.lotery_shop_name');


Route::get('/publicgaming', [App\Http\Controllers\PublicgamingsController::class, 'index'])->name('publicgaming');
Route::post('/publicgaming/add', [App\Http\Controllers\PublicgamingsController::class, 'store'])->name('publicgaming.add');
Route::post('/publicgaming/update', [App\Http\Controllers\PublicgamingsController::class, 'update'])->name('publicgaming.update');
Route::post('/publicgaming/delete', [App\Http\Controllers\PublicgamingsController::class, 'destroy'])->name('publicgaming.delete');
Route::get('/publicgaming_license_name/get',[App\Http\Controllers\PublicgamingsController::class, 'getLicenseeName']);
Route::post('/publicgaming/upload', [App\Http\Controllers\PublicgamingsController::class, 'upload'])->name('publicgaming.upload');
Route::get('/publicgamingsdata/get',[App\Http\Controllers\PublicgamingsController::class, 'publicgamingsdata'])->name('publicgaming.publicgamingsdata');

Route::get('/publicgaminguserindex', [App\Http\Controllers\PublicgamingsController::class, 'publicgaminguserindex'])->name('publicgaminguserindex');


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



Route::get('/sendsms',[App\Http\Controllers\SendSmsController::class, 'index'])->name('sendsms');   
Route::post('/sendsms/add', [App\Http\Controllers\SendSmsController::class, 'store'])->name('sendsms.add');
Route::get('/sendsms/get',[App\Http\Controllers\SendSmsController::class, 'CategoryTypes']);

Route::get('/sendbulksms',[App\Http\Controllers\SendSmsController::class, 'sendbulksms'])->name('sendbulksms');   
Route::post('/send_bulksms/add', [App\Http\Controllers\SendSmsController::class, 'send_bulksms'])->name('sendsms.send_bulksms');

Route::get('/sendsmstocontact',[App\Http\Controllers\SendSmsController::class, 'sendsmstocontact'])->name('sendsmstocontact');   
Route::post('/sendsmstocontact/add', [App\Http\Controllers\SendSmsController::class, 'sendsmstocontact_add'])->name('sendsms.sendsmstocontact_add');





Route::get('/shop',[App\Http\Controllers\ShopController::class, 'index'])->name('shop');   
Route::get('/shopdata/get',[App\Http\Controllers\ShopController::class, 'shopdata'])->name('shopdata.shopdata');
Route::post('/shop/add', [App\Http\Controllers\ShopController::class, 'store'])->name('shop.add');
Route::post('/shop/update', [App\Http\Controllers\ShopController::class, 'update'])->name('shop.update');
Route::get('/publiclottery_shop', [App\Http\Controllers\ShopController::class, 'publiclottery_shop'])->name('publiclottery_shop');
Route::get('/publicgaming_shop', [App\Http\Controllers\ShopController::class, 'publicgaming_shop'])->name('publicgaming_shop');
Route::get('/license_shop_name/get',[App\Http\Controllers\ShopController::class, 'update']);
Route::post('/shop/delete', [App\Http\Controllers\ShopController::class, 'destroy'])->name('shop.delete');

//otp  verify
Route::get('/otp-verify',[App\Http\Controllers\OtpController::class, 'view'])->name('otp-verify');
Route::post('/otp-verify',[App\Http\Controllers\OtpController::class, 'verify'])->name('verify');

//otp  verify User
 Route::get('/otp-verify-user',[App\Http\Controllers\UserOtpController::class, 'view_user']);
 Route::post('/otp-verify-user',[App\Http\Controllers\UserOtpController::class, 'verify_user'])->name('verify_user');

 ///New
 Route::get('/admin/master', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin-master');

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

 
 
 Route::get('/lotterynumbershop', [App\Http\Controllers\CompanyReportController::class, 'lotterynumbershop'])->name('lotterynumbershop');



Route::get('/accounts', [App\Http\Controllers\AccountsController::class, 'index'])->name('accounts');
Route::post('/accounts/add', [App\Http\Controllers\AccountsController::class, 'store'])->name('accounts.add');
Route::get('/accounts/delete_accounts/{id}', [App\Http\Controllers\AccountsController::class, 'destroy'])->name('accounts.delete_accounts');

Route::get('/company/accounts', [App\Http\Controllers\AccountsController::class, 'records'])->name('company.accounts');



Route::get('/AllBookMarkersrecordsreport', [App\Http\Controllers\ReportsController::class, 'AllBookMarkersrecordsreport'])->name('AllBookMarkersrecordsreport');
Route::get('/Allpubliclotteryrecordsreport', [App\Http\Controllers\ReportsController::class, 'Allpubliclotteryrecordsreport'])->name('Allpubliclotteryrecordsreport');
Route::get('/Allgamingrecordsreport', [App\Http\Controllers\ReportsController::class, 'Allgamingrecordsreport'])->name('Allgamingrecordsreport');



//  });
// });
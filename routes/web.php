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
Route::post('/company/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('users.update');
Route::post('/company/delete', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('users.delete');


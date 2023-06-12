<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

// عرض صفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for Companies
// Route::resource('companies', 'App\Http\Controllers\CompanyController')->middleware('auth');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

// Routes for Employees
Route::resource('employees', 'App\Http\Controllers\EmployeeController')->middleware('auth');
// Route::get('/home', function () {
//     return view('home');
// })->name('home');

// عرض نموذج تسجيل الدخول
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
// معالجة نموذج تسجيل الدخول
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
// تسجيل الخروج
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('auth');

// عرض نموذج التسجيل
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
// معالجة نموذج التسجيل
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// مسارات الوحة المسؤول
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.index');

    // مسارات الشركات
    Route::prefix('companies')->group(function () {

        Route::get('/create', 'App\Http\Controllers\CompanyController@create')->name('admin.companies.create');
        Route::post('/', 'App\Http\Controllers\CompanyController@store')->name('admin.companies.store');
        // Route::get('/{company}', 'App\Http\Controllers\AdminController@showCompany')->name('admin.companies.show');
        Route::get('/{company}/edit', 'App\Http\Controllers\CompanyController@edit')->name('companies.edit');
        Route::put('/{company}', 'App\Http\Controllers\CompanyController@update')->name('companies.update');
        Route::delete('/{company}', 'App\Http\Controllers\CompanyController@destroy')->name('companies.destroy');
    });

    // مسارات الموظفين
    Route::prefix('employees')->group(function () {
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/create', 'App\Http\Controllers\EmployeeController@create')->name('employees.create');
        Route::post('/', 'App\Http\Controllers\EmployeeController@store')->name('employees.store');
        Route::get('/{employee}', 'App\Http\Controllers\EmployeeController@show')->name('employees.show');
        Route::get('/{employee}/edit', 'App\Http\Controllers\EmployeeController@edit')->name('employees.edit');
        Route::put('/{employee}', 'App\Http\Controllers\EmployeeController@update')->name('employees.update');
        Route::delete('/{employee}', 'App\Http\Controllers\EmployeeController@destroy')->name('employees.destroy');
    });
});

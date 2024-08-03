<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(EmployeeController::class)->prefix('employee')->as('employee.')->group(function() {
    
    Route::get('login','login')->name('login');
    Route::post('login_submit','login_submit')->name('login_submit');

    Route::group(['middleware'=>'employee'],function(){
        Route::get('logout','logout')->name('logout');
        Route::get('dashboard','dashboard')->name('dashboard');

        Route::get('/profile', 'profile')->name('profile');

        Route::get('/change_password', 'change_password')->name('change_password');
        Route::put('/change_password_submit', 'change_password_submit')->name('change_password_submit');

        Route::get('/attendance', 'attendance')->name('attendance');
        Route::post('/attendance_leave_submit', 'attendance_leave_submit')->name('attendance_leave_submit');

        Route::get('/apply_leave', 'apply_leave')->name('apply_leave');
        Route::post('/apply_leave_submit', 'apply_leave_submit')->name('apply_leave_submit');
        

    });

});

Route::controller(AdminController::class)->prefix('admin')->as('admin.')->group(function() {
    
    Route::get('login','login')->name('login');
    Route::post('login_submit','login_submit')->name('login_submit');

    Route::group(['middleware'=>'admin'],function(){
        Route::get('logout','logout')->name('logout');
        Route::get('dashboard','dashboard')->name('dashboard');

        Route::get('edit_employee/{id}','edit_employee')->name('edit_employee');
        Route::post('edit_employee_submit/{id}','edit_employee_submit')->name('edit_employee_submit');
        Route::delete('delete_employee/{id}','delete_employee')->name('delete_employee');
        Route::get('change_employee_password/{id}','change_employee_password')->name('change_employee_password');
        Route::put('change_employee_password_submit/{id}','change_employee_password_submit')->name('change_employee_password_submit');
        Route::get('change_employee_status/{id}','change_employee_status')->name('change_employee_status');
        // Route::get('/profile', 'profile')->name('profile');

        // Route::get('/change_password', 'change_password')->name('change_password');
        // Route::put('/change_password_submit', 'change_password_submit')->name('change_password_submit');

        // Route::get('/attendance', 'attendance')->name('attendance');
        // Route::post('/attendance_leave_submit', 'attendance_leave_submit')->name('attendance_leave_submit');

        // Route::get('/apply_leave', 'apply_leave')->name('apply_leave');
        // Route::post('/apply_leave_submit', 'apply_leave_submit')->name('apply_leave_submit');
        

    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

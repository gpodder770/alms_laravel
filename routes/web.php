<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SuperAdmController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\StudentActiveController;


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

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Page SuperAdmin
Route::prefix('super')->middleware('auth:admin')->group(function () {
    Route::resource('/data/admin', SuperAdminController::class);
    Route::resource('/data/student', StudentActiveController::class);
    Route::get('/', [SuperAdminController::class, 'dashboard'])->name('dashboard-super');
    Route::get('/data/student/reset/{student:nim}', [StudentActiveController::class, 'reset']);
    Route::put('/data/student', [StudentActiveController::class, 'updateprofile']);
    // Route::get('/profile', [SuperAdmController::class, 'edit'])->name('edit');
});

//Page Admin
Route::prefix('admin')->middleware('auth:admin')->group(function (){
    // Route::resource('/data', StudentActiveController::class);
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard-admin');
    Route::resource('/data/student', StudentActiveController::class)->except('destroy');
    Route::get('/data/student/reset/{student:nim}', [StudentActiveController::class, 'reset']);
    Route::put('/data/student', [StudentActiveController::class, 'updateprofile']);
});

//Page Security
Route::prefix('security')->middleware('auth:admin')->group(function (){
    // Route::resource('/data', StudentActiveController::class);
    Route::get('/', [SecurityController::class, 'index'])->name('dashboard-security');
    Route::resource('/data/student', StudentActiveController::class)->except('create','store','edit','update','destroy');
});

//Page Student
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::resource('/data', StudentController::class)->except(['index','create','destroy','store']);
    Route::get('/', [StudentController::class, 'dashboard'])->name('dashboard-student');
    // Route::get('/data/reset/{student:nim}', [StudentActiveController::class, 'reset']);
    // Route::put('/data/updatestudent', [StudentController::class, 'updatestudent']);
    // Route::put('/data', [StudentController::class, 'updatestudent'])->name('updatestudent');
    Route::put('/data', [StudentController::class, 'updateprofile'])->name('update-parent');
});



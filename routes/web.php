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
    Route::resource('/data', SuperAdminController::class);
    Route::get('/', [SuperAdminController::class, 'dashboard'])->name('dashboard-super');
    // Route::get('/profile', [SuperAdmController::class, 'edit'])->name('edit');
});

//Page Admin
Route::prefix('admin')->middleware('auth:admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard-admin');
});

//Page Security
Route::prefix('security')->middleware('auth:admin')->group(function (){
    Route::get('/', [SecurityController::class, 'index'])->name('dashboard-security');
});

//Page Student
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('dashboard-student');
});



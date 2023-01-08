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

Route::get('/b', function () {
    return view('index');
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::prefix('super')->middleware('SuperAdm')->group(function () {
    Route::resource('/data', SuperAdminController::class);
    Route::get('/', [SuperAdminController::class, 'dashboard'])->name('dashboard-super');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard-admin');
});

Route::prefix('security')->middleware('auth:admin')->group(function () {
    Route::get('/', [SecurityController::class, 'dashboard'])->name('dashboard-security');
});

Route::middleware('auth:student')->group(function () {
    Route::get('/student', [AdminController::class, 'dashboard'])->name('dashboard-student');
});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SuperAdmController;
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

//Page Super Admin
Route::prefix('super')->middleware('superadm')->group(function () {
    Route::resource('/profile', SuperAdmController::class);
    Route::get('/', [SuperAdmController::class, 'index'])->name('dashboard-super');
    Route::get('/profile', [SuperAdmController::class, 'editprofile'])->name('profile-edit');
    Route::put('/profile', [SuperAdmController::class, 'updateprofile'])->name('profile-update');

    // Route::get('/profile/{username}', [AdminController::class, 'show']);
    // Route::put('profile/{username}', [AdminController::class, 'update']);
    // Route::post('profile/{username}', [AdminController::class, 'update']);
    // Route::get('profile/{admin:username}', [AdminController::class, 'show']);
    // Route::get('/profile', [AdminController::class, 'dashboard'])->name('dashboard-admin');
});

//Page Admin
Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard-admin');
});

//Page Security
Route::prefix('security')->middleware('security')->group(function (){
    Route::get('/', [SecurityController::class, 'index'])->name('dashboard-security');
});

//Page Student
Route::prefix('student')->middleware('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('dashboard-student');
});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
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


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('/profile', AdminController::class);
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard-admin');
    Route::get('profile/index', [AdminController::class, 'editprofile'])->name('profile-edit');
    Route::put('/profile/update', [AdminController::class, 'updateprofile'])->name('profile-update');

    // Route::get('/profile/{username}', [AdminController::class, 'show']);
    // Route::put('profile/{username}', [AdminController::class, 'update']);
    // Route::post('profile/{username}', [AdminController::class, 'update']);
    // Route::get('profile/{admin:username}', [AdminController::class, 'show']);
    // Route::get('/profile', [AdminController::class, 'dashboard'])->name('dashboard-admin');
});
Route::get('/staff', [AdminController::class, 'index'])->name('dashboard-staff');
Route::get('/security', [AdminController::class, 'index'])->name('dashboard-security');

Route::middleware('auth:student')->group(function () {
    Route::get('/student', [AdminController::class, 'dashboards'])->name('dashboard-student');
});



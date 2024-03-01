<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\AdminDashboardController;

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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/store', [AuthController::class, 'registerstore'])->name('registerstore');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/store', [AuthController::class, 'loginstore'])->name('loginstore');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
// Companies Admin Routes Group
Route::middleware(['auth'])->group(function () {
    Route::prefix('companies')->group(function () {
        Route::get('/', [CompaniesController::class, 'companies'])->name('admin-data-companies');
        Route::get('/create', [CompaniesController::class, 'create'])->name('admin-create-companies');
        Route::post('/insert', [CompaniesController::class, 'insert'])->name('admin-insert-companies');
        Route::get('/look/{id}', [CompaniesController::class, 'look'])->name('admin-look-companies');
        Route::put('/update/{id}', [CompaniesController::class, 'update'])->name('admin-update-companies');
        Route::get('/detail/{id}', [CompaniesController::class, 'detail'])->name('admin-detail-companies');
        Route::get('/delete/{id}', [CompaniesController::class, 'delete'])->name('admin-delete-companies');
        Route::get('/report', [CompaniesController::class, 'report'])->name('admin-report-companies');
        Route::get('/report/pdf', [CompaniesController::class, 'reportPDF'])->name('admin-reportPDF-companies');
    });
});

// Employees Admin Routes Group
Route::middleware(['auth'])->group(function () {
    Route::prefix('emoployees')->group(function () {
        Route::get('/', [EmployeeController::class, 'emoployees'])->name('admin-data-emoployees');
        Route::get('/create', [EmployeeController::class, 'create'])->name('admin-create-emoployees');
        Route::post('/insert', [EmployeeController::class, 'insert'])->name('admin-insert-emoployees');
        Route::get('/look/{id}', [EmployeeController::class, 'look'])->name('admin-look-emoployees');
        Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('admin-update-emoployees');
        Route::get('/detail/{id}', [EmployeeController::class, 'detail'])->name('admin-detail-emoployees');
        Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('admin-delete-emoployees');
        Route::get('/report', [EmployeeController::class, 'report'])->name('admin-report-emoployees');
        Route::get('/report/pdf', [EmployeeController::class, 'reportPDF'])->name('admin-reportPDF-emoployees');
    });
});


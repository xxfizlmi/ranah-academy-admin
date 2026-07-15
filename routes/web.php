<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::resource('courses', CourseController::class)->except(['show']);
Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');

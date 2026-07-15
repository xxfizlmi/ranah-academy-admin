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
Route::resource('materials', MaterialController::class)->except(['show', 'create', 'edit']);
Route::resource('certificates', CertificateController::class)->except(['show', 'create', 'edit']);
Route::resource('reports', ReportController::class)->except(['show', 'create', 'edit']);
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

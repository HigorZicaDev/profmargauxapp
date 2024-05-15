<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
    
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::put('/schedules/update/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::get('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
    
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/sales/{id}/edit', [SalesController::class, 'edit'])->name('sales.edit');
    Route::put('/sales/update/{id}', [SalesController::class, 'update'])->name('sales.update');
    Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('sales.delete');

});

require __DIR__.'/auth.php';

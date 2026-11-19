<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ClassroomController;
// use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/viewlayout', function () {
    return view('viewlayout');
});
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/about', [AboutController::class, 'index']);
Route::prefix('admin')
    ->group(function () {
        // STUDENT
        Route::get('/student', [StudentController::class, 'index'])
            ->name('admin.student.index');

        Route::post('/student', [StudentController::class, 'store'])
            ->name('admin.student.store');

        Route::put('/student/{student}', [StudentController::class, 'update'])
            ->name('admin.student.update');

        Route::delete('/student/{student}', [StudentController::class, 'destroy'])
            ->name('admin.student.destroy');

        // CLASSROOM
        Route::get('/classroom', [ClassroomController::class, 'index'])
            ->name('admin.classroom.index');

        Route::post('/classroom', [ClassroomController::class, 'store'])
            ->name('admin.classroom.store');

        Route::get('/classroom/{classroom}', [ClassroomController::class, 'show'])
            ->name('admin.classroom.show');

        Route::put('/classroom/{classroom}', [ClassroomController::class, 'update'])
            ->name('admin.classroom.update');

        Route::delete('/classroom/{classroom}', [ClassroomController::class, 'destroy'])
            ->name('admin.classroom.destroy');

       // SUBJECTS
Route::get('/subjects', [SubjectsController::class, 'index'])
    ->name('admin.subjects.index');

Route::post('/subjects', [SubjectsController::class, 'store'])
    ->name('admin.subjects.store');

Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])
    ->name('admin.subjects.show');

Route::put('/subjects/{subject}', [SubjectsController::class, 'update'])
    ->name('admin.subjects.update');

Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])
    ->name('admin.subjects.destroy');

// TEACHERS
Route::get('/teachers', [TeachersController::class, 'index'])
    ->name('admin.teachers.index');

Route::post('/teachers', [TeachersController::class, 'store'])
    ->name('admin.teachers.store');

Route::get('/teachers/{teacher}', [TeachersController::class, 'show'])
    ->name('admin.teachers.show');

Route::put('/teachers/{teacher}', [TeachersController::class, 'update'])
    ->name('admin.teachers.update');

Route::delete('/teachers/{teacher}', [TeachersController::class, 'destroy'])
    ->name('admin.teachers.destroy');
    });

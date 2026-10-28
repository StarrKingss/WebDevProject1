<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;


Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/viewlayout', function () {
    return view('viewlayout');
});
Route::get('/admin/dashboard',[DashboardController::class,'index']);
Route::get('/admin/about', [AboutController::class, 'index']);
Route::get('/admin/student', [StudentController::class, 'index']);
Route::get('/admin/classroom', [ClassroomController::class, 'index']);
Route::get('/admin/subjects', [SubjectsController::class, 'index']);
Route::get('/admin/teachers', [TeachersController::class, 'index']);

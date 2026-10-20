<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;


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

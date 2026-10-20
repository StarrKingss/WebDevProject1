<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('admin.student', [
            'title' => 'Student',
            'students' => $students
        ]);
    }
}

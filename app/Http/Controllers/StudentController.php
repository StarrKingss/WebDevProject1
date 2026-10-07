<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = [
            [
                'name' => 'Dio Satria Adhie',
                'nis' => '001',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ],
            [
                'name' => 'Budi Santoso',
                'nis' => '002',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ],
            [
                'name' => 'Citra Lestari',
                'nis' => '003',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ],
            [
                'name' => 'Andi Pratama',
                'nis' => '004',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ],
            [
                'name' => 'Pari lugas',
                'nis' => '005',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ]
            ,
            [
                'name' => 'Pari lugas',
                'nis' => '006',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ]
            ,
            [
                'name' => 'Pari lugas',
                'nis' => '007',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ]
            ,
            [
                'name' => 'Pari lugas',
                'nis' => '008',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ]
            ,
            [
                'name' => 'Pari lugas',
                'nis' => '009',
                'kelas' => '11 PPLG 3',
                'jurusan' => 'PPLG',
                'status' => 'Active'
            ]
        ];
        return view('admin.student',[
            'title' => 'Student',
            'students' => $students
        ]);
    }
}

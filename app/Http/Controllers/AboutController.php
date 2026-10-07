<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about',[
            'title'=> "About",
            'nama'=>"Dio Satria Adhie",
            'kelas'=>"11plg3",
            'umur'=>"16",        ]);
    }
}

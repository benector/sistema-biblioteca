<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class HomeAdminController extends Controller
{
    public function index()
    {
        $lastCourses = Course::latest()->take(3)->get();
   // dd(count($lastCourses)==0);
return view('admin.home.index',compact('lastCourses'));
    }
}



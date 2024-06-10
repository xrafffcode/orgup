<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.student.dashoard');
    }

    public function course()
    {
        $enrollments = Auth::user()->student->enrollments->map(function ($enrollment) {
            return $enrollment->course;
        });

        return view('pages.student.course', compact('enrollments'));
    }
}
